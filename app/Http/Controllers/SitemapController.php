<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    private const MAX_URLS = 50000;

    public function index(): Response
    {
        $staticUrls = $this->staticUrls();
        $blogCount = Blog::count();
        $pageCount = max(1, (int) ceil(($blogCount + count($staticUrls)) / self::MAX_URLS));

        if ($pageCount > 1) {
            return $this->xmlResponse($this->renderSitemapIndex($pageCount));
        }

        $blogUrls = Blog::query()
            ->select(['slug', 'updated_at'])
            ->orderBy('id')
            ->get()
            ->map(fn (Blog $post) => [
                'loc' => $this->absoluteUrl(route('blog.show', $post->slug, false)),
                'lastmod' => $post->updated_at?->toAtomString(),
            ])
            ->all();

        return $this->xmlResponse($this->renderUrlSet([...$staticUrls, ...$blogUrls]));
    }

    public function chunk(int $page): Response
    {
        $staticUrls = $this->staticUrls();
        $blogCount = Blog::count();
        $pageCount = max(1, (int) ceil(($blogCount + count($staticUrls)) / self::MAX_URLS));
        abort_unless($page > 0 && $page <= $pageCount, 404);

        $staticCount = $page === 1 ? count($staticUrls) : 0;
        $blogLimit = self::MAX_URLS - $staticCount;
        $blogOffset = $page === 1
            ? 0
            : (self::MAX_URLS - count($staticUrls)) + (($page - 2) * self::MAX_URLS);

        $blogUrls = Blog::query()
            ->select(['slug', 'updated_at'])
            ->orderBy('id')
            ->skip($blogOffset)
            ->take($blogLimit)
            ->get()
            ->map(fn (Blog $post) => [
                'loc' => $this->absoluteUrl(route('blog.show', $post->slug, false)),
                'lastmod' => $post->updated_at?->toAtomString(),
            ])
            ->all();

        return $this->xmlResponse($this->renderUrlSet([...($page === 1 ? $staticUrls : []), ...$blogUrls]));
    }

    private function staticUrls(): array
    {
        $paths = [
            route('home', [], false),
            route('about', [], false),
            route('contact', [], false),
            route('blog', [], false),
            route('services.web-app', [], false),
            route('services.web-dev', [], false),
            route('services.software', [], false),
            route('services.marketing', [], false),
            route('services.graphics', [], false),
            route('services.ui-ux', [], false),
        ];

        return collect($paths)
            ->unique()
            ->map(fn (string $path) => ['loc' => $this->absoluteUrl($path)])
            ->all();
    }

    private function absoluteUrl(string $path): string
    {
        return rtrim(config('app.url', 'https://crownsit.com'), '/') . '/' . ltrim($path, '/');
    }

    private function renderSitemapIndex(int $pageCount): string
    {
        $sitemaps = '';

        for ($page = 1; $page <= $pageCount; $page++) {
            $loc = $this->absoluteUrl(route('sitemap.chunk', $page, false));
            $sitemaps .= '<sitemap><loc>' . $this->xmlEscape($loc) . '</loc></sitemap>';
        }

        return '<?xml version="1.0" encoding="UTF-8"?>'
            . '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'
            . $sitemaps
            . '</sitemapindex>';
    }

    private function renderUrlSet(array $urls): string
    {
        $entries = '';

        foreach ($urls as $url) {
            $entries .= '<url><loc>' . $this->xmlEscape($url['loc']) . '</loc>';

            if (!empty($url['lastmod'])) {
                $entries .= '<lastmod>' . $this->xmlEscape($url['lastmod']) . '</lastmod>';
            }

            $entries .= '</url>';
        }

        return '<?xml version="1.0" encoding="UTF-8"?>'
            . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'
            . $entries
            . '</urlset>';
    }

    private function xmlEscape(string $value): string
    {
        return htmlspecialchars($value, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }

    private function xmlResponse(string $xml): Response
    {
        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
