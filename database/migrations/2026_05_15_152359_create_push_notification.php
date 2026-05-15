<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('push_notifications', function (Blueprint $table) {

            $table->id();

            // User who receives notification
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Notification content
            $table->string('title');
            $table->text('body');

            // Notification type
            $table->string('type');
            // price_drop | new_message | other_update

            // Read status
            $table->boolean('is_read')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('push_notifications');
    }
};