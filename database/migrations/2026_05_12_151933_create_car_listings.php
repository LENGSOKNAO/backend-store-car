<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_listings', function (Blueprint $table) {

            $table->id();

            // Foreign Keys
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('car_make_id')
                  ->constrained('tblcar_makes')
                  ->onDelete('cascade');

            $table->foreignId('car_model_id')
                  ->constrained('tblcar_models')
                  ->onDelete('cascade');

            // Car Information
            $table->year('year');

            $table->decimal('price', 12, 2);

            $table->decimal('original_price', 12, 2)
                  ->nullable();

            $table->integer('mileage');

            $table->string('fuel_type');
            // petrol | diesel | electric | hybrid

            $table->string('transmission');
            // automatic | manual

            $table->string('engine_size');
            // 2.0L | electric

            $table->string('color');

            $table->string('interior_color');

            $table->string('condition');
            // new | used | certified

            $table->integer('number_of_owners')
                  ->default(1);

            $table->string('vin')
                  ->unique();

            $table->string('license_plate')
                  ->nullable();

            $table->text('description');

            $table->string('location');

            $table->integer('views_count')
                  ->default(0);

            $table->string('status')
                  ->default('active');
            // active | sold | reserved | expired

            $table->timestamp('expires_at')
                  ->default(now()->addDays(90));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_listings');
    }
};