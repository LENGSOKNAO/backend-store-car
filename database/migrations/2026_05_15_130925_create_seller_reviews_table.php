<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seller_reviews', function (Blueprint $table) {

            $table->id();

            // Buyer who writes review
            $table->foreignId('reviewer_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Seller being reviewed
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Optional related car listing
            $table->foreignId('listing_id')
                  ->nullable()
                  ->constrained('car_listings')
                  ->onDelete('set null');

            // Ratings
            $table->integer('rating');
            $table->integer('communication_rating');
            $table->integer('accuracy_rating');

            // Review comment
            $table->text('comment');

            // Verified purchase
            $table->boolean('is_verified_purchase')
                  ->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seller_reviews');
    }
};