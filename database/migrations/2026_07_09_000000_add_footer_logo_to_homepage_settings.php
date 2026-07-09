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
        $setting = [
            'key' => 'footer_logo',
            'value' => null,
            'label' => 'Footer Logo',
            'type' => 'image',
            'group' => 'footer',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        DB::table('homepage_settings')->insert($setting);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('homepage_settings')
            ->where('key', 'footer_logo')
            ->delete();
    }
};
