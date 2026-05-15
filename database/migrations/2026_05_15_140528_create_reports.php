<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {

            $table->id();

            // User who created the report
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Optional reported listing
            $table->foreignId('listing_id')
                  ->nullable()
                  ->constrained('car_listings')
                  ->onDelete('set null');

            // Optional reported user
            $table->foreignId('reported_user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            // Report reason
            $table->string('reason');
            // fraud | misleading_info | spam | other

            // Additional details
            $table->text('description')->nullable();

            // Report status
            $table->string('status')
                  ->default('pending');
            // pending | investigated | resolved

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};