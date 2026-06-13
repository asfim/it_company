<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('graphics_design_sections', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('label');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('alt_text')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        $now = now();

        DB::table('graphics_design_sections')->insert([
            ['slug' => 'hero_background', 'label' => 'Hero Section Background', 'description' => 'Background image for the hero section.', 'sort_order' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_logo', 'label' => 'Logo Design Card Image', 'description' => 'Image shown on the Logo Design service card.', 'sort_order' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_book_cover', 'label' => 'Book Cover Card Image', 'description' => 'Image shown on the Book Cover Design service card.', 'sort_order' => 20, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_formatting', 'label' => 'Book Formatting Card Image', 'description' => 'Image shown on the Book Formatting service card.', 'sort_order' => 30, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_amazon_aplus', 'label' => 'Amazon A+ Content Card Image', 'description' => 'Image shown on the Amazon A+ Content service card.', 'sort_order' => 40, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_social', 'label' => 'Social Media Poster Card Image', 'description' => 'Image shown on the Social Media Poster service card.', 'sort_order' => 50, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_business_card', 'label' => 'Business Card Design Card Image', 'description' => 'Image shown on the Business Card Design service card.', 'sort_order' => 60, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_flyer', 'label' => 'Flyer Design Card Image', 'description' => 'Image shown on the Flyer Design service card.', 'sort_order' => 70, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'service_brochure', 'label' => 'Brochure Design Card Image', 'description' => 'Image shown on the Brochure Design service card.', 'sort_order' => 80, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_1', 'label' => 'Portfolio Image 1', 'description' => 'Portfolio item image 1.', 'sort_order' => 100, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_2', 'label' => 'Portfolio Image 2', 'description' => 'Portfolio item image 2.', 'sort_order' => 110, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_3', 'label' => 'Portfolio Image 3', 'description' => 'Portfolio item image 3.', 'sort_order' => 120, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_4', 'label' => 'Portfolio Image 4', 'description' => 'Portfolio item image 4.', 'sort_order' => 130, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_5', 'label' => 'Portfolio Image 5', 'description' => 'Portfolio item image 5.', 'sort_order' => 140, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_6', 'label' => 'Portfolio Image 6', 'description' => 'Portfolio item image 6.', 'sort_order' => 150, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_7', 'label' => 'Portfolio Image 7', 'description' => 'Portfolio item image 7.', 'sort_order' => 160, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_8', 'label' => 'Portfolio Image 8', 'description' => 'Portfolio item image 8.', 'sort_order' => 170, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_9', 'label' => 'Portfolio Image 9', 'description' => 'Portfolio item image 9.', 'sort_order' => 180, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_10', 'label' => 'Portfolio Image 10', 'description' => 'Portfolio item image 10.', 'sort_order' => 190, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_11', 'label' => 'Portfolio Image 11', 'description' => 'Portfolio item image 11.', 'sort_order' => 200, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_12', 'label' => 'Portfolio Image 12', 'description' => 'Portfolio item image 12.', 'sort_order' => 210, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_13', 'label' => 'Portfolio Image 13', 'description' => 'Portfolio item image 13.', 'sort_order' => 220, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'portfolio_14', 'label' => 'Portfolio Image 14', 'description' => 'Portfolio item image 14.', 'sort_order' => 230, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('graphics_design_sections');
    }
};
