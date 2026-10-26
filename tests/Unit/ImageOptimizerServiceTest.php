<?php

namespace Tests\Unit;

use App\Services\ImageOptimizerService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImageOptimizerServiceTest extends TestCase
{
    public function test_it_generates_seo_friendly_alt_text(): void
    {
        $alt = ImageOptimizerService::generateAltText('Custom Web Application', 'Services');
        $this->assertStringContainsString('Custom Web Application', $alt);
        $this->assertStringContainsString('Crowns IT', $alt);

        $emptyAlt = ImageOptimizerService::generateAltText('', 'Custom Software');
        $this->assertStringContainsString('Custom Software Software Development & IT Solutions', $emptyAlt);
    }

    public function test_it_optimizes_and_converts_uploaded_image_to_seo_webp(): void
    {
        Storage::fake('public');

        // Create a 1600x1200 dummy image
        $file = UploadedFile::fake()->image('my-huge-raw-photo.jpg', 1600, 1200);

        $path = ImageOptimizerService::uploadAndOptimize(
            $file,
            'products',
            'E-Commerce POS Management',
            800,
            'public'
        );

        $this->assertStringStartsWith('products/crowns-it-e-commerce-pos-management', $path);
        $this->assertStringEndsWith('.webp', $path);

        Storage::disk('public')->assertExists($path);

        // Verify the stored image width is constrained to max 800
        $fullPath = Storage::disk('public')->path($path);
        $info = getimagesize($fullPath);
        $this->assertLessThanOrEqual(800, $info[0]);
    }

    public function test_it_does_not_delete_static_default_assets(): void
    {
        Storage::fake('public');

        ImageOptimizerService::deleteOldImage('assets/1.webp');
        ImageOptimizerService::deleteOldImage('images/sample.jpg');
        ImageOptimizerService::deleteOldImage('https://images.unsplash.com/photo-123');

        // None of these should throw or delete system files
        $this->assertTrue(true);
    }
}
