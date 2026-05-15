<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {

            $table->id();

            // Related listing
            $table->foreignId('listing_id')
                  ->constrained('car_listings')
                  ->onDelete('cascade');

            // Buyer (who sends inquiry)
            $table->foreignId('buyer_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Seller (who receives inquiry)
            $table->foreignId('seller_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Message content
            $table->text('message');

            // Buyer contact info (optional override)
            $table->string('phone_number')->nullable();

            // Preferred contact method
            $table->string('preferred_contact');
            // email | phone | chat

            // Inquiry status
            $table->string('status')->default('new');
            // new | read | replied | archived

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};