<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('search_filters', function (Blueprint $table) {

            $table->id();

            // User who saved filter
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Filter name (e.g. "Daily commute search")
            $table->string('name');

            // Store filter data (price, make, model, year, mileage, etc.)
            $table->json('filters');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('search_filters');
    }
};