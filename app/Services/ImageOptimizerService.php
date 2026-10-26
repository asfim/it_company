<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageOptimizerService
{
    /**
     * Store and auto-optimize an uploaded image with SEO-friendly naming and WebP compression.
     *
     * @param UploadedFile $file The uploaded file instance
     * @param string $directory Target storage directory (e.g., 'homepage', 'team', 'products', 'uploads/blogs')
     * @param string|null $seoHint Name/keyword context to build SEO filename (e.g. blog title, product name)
     * @param int|null $maxWidth Explicit max width constraint (auto-detected if null)
     * @param string $disk 'public' (storage/app/public) or 'root_public' (public/)
     * @return string Stored relative path
     */
    public static function uploadAndOptimize(
        UploadedFile $file,
        string $directory = 'homepage',
        ?string $seoHint = null,
        ?int $maxWidth = null,
        string $disk = 'public'
    ): string {
        $mime = $file->getMimeType() ?: '';
        $originalExt = strtolower($file->getClientOriginalExtension());

        // Auto-detect max width by context if not specified
        if ($maxWidth === null) {
            $maxWidth = self::resolveMaxWidthByContext($directory, $seoHint);
        }

        // Generate clean SEO-friendly slug
        $baseName = $seoHint ?: pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $cleanSlug = Str::slug($baseName);
        if (empty($cleanSlug) || $cleanSlug === 'image') {
            $cleanSlug = 'software-development';
        }
        if (!str_starts_with($cleanSlug, 'crowns-it')) {
            $cleanSlug = 'crowns-it-' . $cleanSlug;
        }
        $cleanSlug = Str::limit($cleanSlug, 55, '');

        // If SVG or ICO, keep original extension without raster manipulation
        if (in_array($originalExt, ['svg', 'ico'], true) || str_contains($mime, 'svg') || str_contains($mime, 'icon')) {
            $filename = $cleanSlug . '-' . Str::random(6) . '.' . $originalExt;
            if ($disk === 'root_public') {
                $targetDir = public_path($directory);
                if (!is_dir($targetDir)) @mkdir($targetDir, 0755, true);
                $file->move($targetDir, $filename);
                return rtrim($directory, '/') . '/' . $filename;
            } else {
                return $file->storeAs($directory, $filename, 'public');
            }
        }

        // Process raster images (JPEG, PNG, WebP, etc.) to optimized WebP
        $filename = $cleanSlug . '-' . Str::random(6) . '.webp';

        if ($disk === 'root_public') {
            $targetDir = public_path($directory);
            if (!is_dir($targetDir)) @mkdir($targetDir, 0755, true);
            $destinationPath = $targetDir . DIRECTORY_SEPARATOR . $filename;
            $relativeResult = rtrim($directory, '/') . '/' . $filename;
        } else {
            $destinationPath = Storage::disk($disk)->path(trim($directory, '/') . '/' . $filename);
            $relativeResult = trim($directory, '/') . '/' . $filename;
        }

        $tempPath = $file->getRealPath();
        $processed = self::processImageToWebp($tempPath, $destinationPath, $maxWidth, 82);

        if (!$processed) {
            // Fallback: standard upload if GD fails
            if ($disk === 'root_public') {
                $file->move(public_path($directory), $filename);
                return rtrim($directory, '/') . '/' . $filename;
            }
            return $file->storeAs($directory, $filename, 'public');
        }

        // Also update symlinked public storage copy if public disk was used
        if ($disk === 'public') {
            $publicMirror = public_path('storage/' . trim($directory, '/') . '/' . $filename);
            $mirrorDir = dirname($publicMirror);
            if (!is_dir($mirrorDir)) @mkdir($mirrorDir, 0755, true);
            if (!file_exists($publicMirror) && file_exists($destinationPath)) {
                @copy($destinationPath, $publicMirror);
            }
        }

        return $relativeResult;
    }

    /**
     * Delete an existing image file safely if it is a local upload.
     */
    public static function deleteOldImage(?string $path, string $disk = 'public'): void
    {
        if (empty($path)) return;

        // Never delete default static assets
        if (str_starts_with($path, 'assets/') || str_starts_with($path, 'images/') || str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return;
        }

        if ($disk === 'public') {
            Storage::disk('public')->delete($path);
            $mirror = public_path('storage/' . ltrim($path, '/'));
            if (file_exists($mirror) && is_file($mirror)) {
                @unlink($mirror);
            }
        } else {
            $full = public_path(ltrim($path, '/'));
            if (file_exists($full) && is_file($full)) {
                @unlink($full);
            }
        }
    }

    /**
     * Resize and compress an image file to modern WebP format using GD.
     */
    public static function processImageToWebp(
        string $sourcePath,
        string $destinationPath,
        int $maxWidth = 800,
        int $quality = 82
    ): bool {
        if (!file_exists($sourcePath) || !is_file($sourcePath)) return false;

        $info = @getimagesize($sourcePath);
        if (!$info) return false;

        $origW = $info[0];
        $origH = $info[1];
        $mime  = $info['mime'] ?? '';

        $src = null;
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $src = @imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $src = @imagecreatefrompng($sourcePath);
                break;
            case 'image/webp':
                $src = @imagecreatefromwebp($sourcePath);
                break;
            case 'image/gif':
                $src = @imagecreatefromgif($sourcePath);
                break;
            default:
                return false;
        }

        if (!$src) return false;

        // Proportional sizing
        if ($origW > $maxWidth) {
            $targetW = $maxWidth;
            $targetH = (int) round(($origH / $origW) * $targetW);
        } else {
            $targetW = $origW;
            $targetH = $origH;
        }

        $dst = imagecreatetruecolor($targetW, $targetH);

        // Alpha transparency handling
        imagealphablending($dst, false);
        imagesavealpha($dst, true);
        $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
        imagefilledrectangle($dst, 0, 0, $targetW, $targetH, $transparent);

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetW, $targetH, $origW, $origH);

        $destDir = dirname($destinationPath);
        if (!is_dir($destDir)) {
            @mkdir($destDir, 0755, true);
        }

        $saved = function_exists('imagewebp')
            ? imagewebp($dst, $destinationPath, $quality)
            : false;

        if (!$saved) {
            if ($mime === 'image/png') {
                imagepng($dst, $destinationPath, 8);
            } else {
                imagejpeg($dst, $destinationPath, $quality);
            }
        }

        imagedestroy($src);
        imagedestroy($dst);
        clearstatcache(true, $destinationPath);

        return file_exists($destinationPath);
    }

    /**
     * Resolve optimal maximum width depending on directory or purpose.
     */
    private static function resolveMaxWidthByContext(string $directory, ?string $seoHint): int
    {
        $dir = strtolower($directory);
        $hint = strtolower((string) $seoHint);

        if (str_contains($dir, 'logo') || str_contains($hint, 'logo')) {
            return 360;
        }
        if (str_contains($dir, 'favicon') || str_contains($hint, 'favicon')) {
            return 64;
        }
        if (str_contains($dir, 'team') || str_contains($dir, 'avatar') || str_contains($hint, 'member') || str_contains($hint, 'team')) {
            return 400;
        }
        if (str_contains($dir, 'product') || str_contains($dir, 'service') || str_contains($dir, 'graphics')) {
            return 800;
        }
        if (str_contains($dir, 'blog')) {
            return 1200;
        }

        return 800;
    }

    /**
     * Generate an SEO-rich alt attribute text for views and templates.
     */
    public static function generateAltText(?string $title, string $context = 'Crowns IT'): string
    {
        $clean = trim((string) $title);
        if (empty($clean)) {
            return $context . ' Software Development & IT Solutions';
        }
        if (!str_contains(strtolower($clean), 'crowns it')) {
            return $clean . ' - Crowns IT';
        }
        return $clean;
    }
}
