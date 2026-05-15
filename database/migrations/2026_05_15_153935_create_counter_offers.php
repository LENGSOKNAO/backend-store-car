<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('counter_offers', function (Blueprint $table) {

            $table->id();

            // Related original offer
            $table->foreignId('offer_id')
                  ->constrained('offers')
                  ->onDelete('cascade');

            // Counter price
            $table->decimal('countered_price', 12, 2);

            // Message
            $table->text('message')->nullable();

            // Who created counter offer (buyer or seller)
            $table->foreignId('created_by_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counter_offers');
    }
};