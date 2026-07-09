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
                'key' => 'contact_working_hours',
                'value' => "Sat – Thu: 9:00 AM – 6:00 PM\nFriday: Closed",
                'label' => 'Working Hours',
                'type' => 'textarea',
                'group' => 'footer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'contact_map_embed',
                'value' => 'https://maps.google.com/maps?q=Dhaka%2C%20Bangladesh&z=13&output=embed',
                'label' => 'Google Maps Embed URL',
                'type' => 'textarea',
                'group' => 'footer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'contact_map_link',
                'value' => 'https://maps.google.com/?q=Dhaka,Bangladesh',
                'label' => 'Google Maps Share Link',
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
            ->whereIn('key', ['contact_working_hours', 'contact_map_embed', 'contact_map_link'])
            ->delete();
    }
};
