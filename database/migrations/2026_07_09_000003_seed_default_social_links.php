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
        $links = [
            [
                'platform' => 'facebook',
                'url' => 'https://facebook.com',
                'sort_order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'platform' => 'x',
                'url' => 'https://x.com',
                'sort_order' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'platform' => 'instagram',
                'url' => 'https://instagram.com',
                'sort_order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'platform' => 'linkedin',
                'url' => 'https://linkedin.com',
                'sort_order' => 40,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('social_links')->insert($links);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('social_links')->truncate();
    }
};
