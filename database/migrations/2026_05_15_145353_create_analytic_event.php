<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('analytics_events', function (Blueprint $table) {

            $table->id();

            // event type
            $table->string('event_type');
            // search | view_listing | contact_seller | save

            // optional user (guest allowed)
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            // optional listing
            $table->foreignId('listing_id')
                  ->nullable()
                  ->constrained('car_listings')
                  ->nullOnDelete();

            // extra data (search, filters, referrer)
            $table->json('metadata')->nullable();

            // device type
            $table->string('device_type');
            // mobile | desktop | tablet

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analytics_events');
    }
};