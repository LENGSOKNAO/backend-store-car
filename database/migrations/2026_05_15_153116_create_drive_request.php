<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drive_request', function (Blueprint $table) {

            $table->id();

            // Car listing
            $table->foreignId('listing_id')
                  ->constrained('car_listings')
                  ->onDelete('cascade');

            // Buyer (requester)
            $table->foreignId('buyer_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Seller (owner)
            $table->foreignId('seller_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Preferred schedule
            $table->date('preferred_date');
            $table->time('preferred_time');

            // Pickup location
            $table->string('pickup_location')->nullable();

            // Status
            $table->string('status')->default('pending');
            // pending | confirmed | cancelled | completed

            // Seller notes
            $table->text('seller_notes')->nullable();

            // Tracking timestamps
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamp('confirmed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drive_request');
    }
};