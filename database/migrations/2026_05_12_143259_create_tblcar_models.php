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
        Schema::create('tblcar_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_makes_id')
              ->constrained('tblcar_makes')
              ->onDelete('cascade');

            $table->string('name');
            $table->integer('start_year');
            $table->integer('end_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcar_models');
    }
};
