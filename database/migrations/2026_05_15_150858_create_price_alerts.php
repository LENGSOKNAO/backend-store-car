<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_alerts', function (Blueprint $table) {

            $table->id();

            // User who created alert
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Optional filters
            $table->foreignId('make_id')
                  ->nullable()
                  ->constrained('car_makes')
                  ->nullOnDelete();

            $table->foreignId('model_id')
                  ->nullable()
                  ->constrained('car_models')
                  ->nullOnDelete();

            // Price range
            $table->decimal('min_price', 12, 2)->nullable();
            $table->decimal('max_price', 12, 2)->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_alerts');
    }
};