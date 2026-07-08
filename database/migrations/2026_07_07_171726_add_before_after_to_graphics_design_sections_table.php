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
                'slug' => 'hero_before_image',
                'label' => 'Hero Before Image (Sketch/Original)',
                'description' => 'Original/before image comparison view shown in the hero slider.',
                'image_path' => null,
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'slug' => 'hero_after_image',
                'label' => 'Hero After Image (Vector/Finished)',
                'description' => 'Finished/after image comparison view shown in the hero slider.',
                'image_path' => null,
                'sort_order' => 2,
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
        DB::table('graphics_design_sections')->whereIn('slug', ['hero_before_image', 'hero_after_image'])->delete();
    }
};
