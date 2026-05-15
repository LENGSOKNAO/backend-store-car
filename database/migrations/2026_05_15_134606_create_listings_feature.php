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
        Schema::create('listings_feature', function (Blueprint $table) {
            $table->id('featurelist_id');
            $table->foreignId('feature_id')->constrained('car_feature_junction')->onDelete('cascade');
            $table-> string('name_feature');
            $table -> string('category');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings_feature');
    }
};
