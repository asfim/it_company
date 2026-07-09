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
        $settings = [
            [
                'key' => 'footer_description',
                'value' => 'Crafting high-performance digital experiences with precision and passion. Your partner in technological innovation.',
                'label' => 'Footer Description',
                'type' => 'textarea',
                'group' => 'footer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Tech Avenue, Dhaka, Bangladesh',
                'label' => 'Contact Address',
                'type' => 'text',
                'group' => 'footer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'contact_phone',
                'value' => '+8801777494071',
                'label' => 'Contact Phone Number',
                'type' => 'text',
                'group' => 'footer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@crownsit.com',
                'label' => 'Contact Email Address',
                'type' => 'text',
                'group' => 'footer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('homepage_settings')->insert($settings);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('homepage_settings')
            ->whereIn('key', ['footer_description', 'contact_address', 'contact_phone', 'contact_email'])
            ->delete();
    }
};
