<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('label');
            $table->string('type')->default('text'); // text, textarea, image
            $table->string('group')->default('general');
            $table->timestamps();
        });

        Schema::create('homepage_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('icon')->nullable(); // Lucide icon name
            $table->string('link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('homepage_wcu_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('icon_svg')->nullable(); // SVG or class
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('homepage_processes', function (Blueprint $table) {
            $table->id();
            $table->integer('step_number');
            $table->string('title');
            $table->text('description');
            $table->text('icon_svg')->nullable(); // SVG or class
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('homepage_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('features')->nullable(); // Multi-line text for features
            $table->string('mock_title')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('homepage_technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_class'); // Devicon class
            $table->enum('direction', ['left', 'right'])->default('left');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('homepage_team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('homepage_testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->integer('stars')->default(5);
            $table->text('review');
            $table->string('avatar_bg')->default('#3b82f6');
            $table->unsignedTinyInteger('row')->default(1); // 1 = top marquee row, 2 = bottom
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_testimonials');
        Schema::dropIfExists('homepage_team_members');
        Schema::dropIfExists('homepage_technologies');
        Schema::dropIfExists('homepage_products');
        Schema::dropIfExists('homepage_processes');
        Schema::dropIfExists('homepage_wcu_cards');
        Schema::dropIfExists('homepage_services');
        Schema::dropIfExists('homepage_settings');
    }
};
