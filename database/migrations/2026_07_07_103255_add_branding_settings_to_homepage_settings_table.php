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
        DB::table('homepage_settings')->insert([
            [
                'key' => 'site_logo',
                'value' => null,
                'label' => 'Website Logo',
                'type' => 'image',
                'group' => 'branding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_favicon',
                'value' => null,
                'label' => 'Website Favicon',
                'type' => 'image',
                'group' => 'branding',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('homepage_settings')->whereIn('key', ['site_logo', 'site_favicon'])->delete();
    }
};
