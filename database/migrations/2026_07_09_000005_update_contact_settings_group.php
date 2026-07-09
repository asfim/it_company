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
        DB::table('homepage_settings')
            ->whereIn('key', [
                'contact_address',
                'contact_phone',
                'contact_email',
                'contact_working_hours',
                'contact_map_embed',
                'contact_map_link'
            ])
            ->update(['group' => 'contact']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('homepage_settings')
            ->whereIn('key', [
                'contact_address',
                'contact_phone',
                'contact_email',
                'contact_working_hours',
                'contact_map_embed',
                'contact_map_link'
            ])
            ->update(['group' => 'footer']);
    }
};
