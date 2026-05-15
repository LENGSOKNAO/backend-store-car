<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {

            $table->id();

            // Related listing
            $table->foreignId('listing_id')
                  ->constrained('car_listings')
                  ->onDelete('cascade');

            // Buyer making offer
            $table->foreignId('buyer_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Seller receiving offer
            $table->foreignId('seller_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Offered price
            $table->decimal('offered_price', 12, 2);

            // Message
            $table->text('message')->nullable();

            // Offer status
            $table->string('status')->default('pending');
            // pending | accepted | rejected | countered

            // Expiration time
            $table->timestamp('expires_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};