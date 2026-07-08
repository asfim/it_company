<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $now = now();
        DB::table('graphics_design_sections')->insert([
            [
                'slug' => 'service_bgremove_before',
                'label' => 'Background Removal - Before (Original Image)',
                'description' => 'Original image showing background to be removed.',
                'image_path' => null,
                'alt_text' => 'Background Removal Before',
                'sort_order' => 81,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'service_bgremove_after',
                'label' => 'Background Removal - After (Clean Image)',
                'description' => 'Finished image with background removed.',
                'image_path' => null,
                'alt_text' => 'Background Removal After',
                'sort_order' => 82,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'service_retouch_before',
                'label' => 'Photo Retouching - Before (Dull/Original)',
                'description' => 'Original unretouched image.',
                'image_path' => null,
                'alt_text' => 'Photo Retouching Before',
                'sort_order' => 83,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'service_retouch_after',
                'label' => 'Photo Retouching - After (Enhanced/Retouched)',
                'description' => 'Color-corrected and retouched finished image.',
                'image_path' => null,
                'alt_text' => 'Photo Retouching After',
                'sort_order' => 84,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'service_clipping_before',
                'label' => 'Clipping Path - Before (Original Image)',
                'description' => 'Original product image before clipping path is applied.',
                'image_path' => null,
                'alt_text' => 'Clipping Path Before',
                'sort_order' => 85,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'service_clipping_after',
                'label' => 'Clipping Path - After (Isolated Image)',
                'description' => 'Image with isolated clipping path overlay.',
                'image_path' => null,
                'alt_text' => 'Clipping Path After',
                'sort_order' => 86,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'service_ghost_before',
                'label' => 'Ghost Mannequin - Before (On Mannequin)',
                'description' => 'Product shot with model or mannequin visible.',
                'image_path' => null,
                'alt_text' => 'Ghost Mannequin Before',
                'sort_order' => 87,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'service_ghost_after',
                'label' => 'Ghost Mannequin - After (Hollow 3D)',
                'description' => 'Finished ghost mannequin hollow-man effect.',
                'image_path' => null,
                'alt_text' => 'Ghost Mannequin After',
                'sort_order' => 88,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('graphics_design_sections')->whereIn('slug', [
            'service_bgremove_before',
            'service_bgremove_after',
            'service_retouch_before',
            'service_retouch_after',
            'service_clipping_before',
            'service_clipping_after',
            'service_ghost_before',
            'service_ghost_after'
        ])->delete();
    }
};
