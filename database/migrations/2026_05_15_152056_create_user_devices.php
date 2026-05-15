<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_devices', function (Blueprint $table) {

            $table->id();

            // User who owns device
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Push notification token (FCM / APNS)
            $table->string('device_token')->unique();

            // Platform type
            $table->string('platform');
            // ios | android

            // App version
            $table->string('app_version')->nullable();

            // Last active time
            $table->timestamp('last_used')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_devices');
    }
};