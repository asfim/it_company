<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('get_started_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('service');
            $table->text('message');
            $table->boolean('mail_sent')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('get_started_submissions');
    }
};
