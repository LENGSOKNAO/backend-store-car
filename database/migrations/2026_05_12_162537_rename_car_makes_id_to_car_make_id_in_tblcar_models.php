<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tblcar_models', function (Blueprint $table) {

            // 1. drop old foreign key first
            $table->dropForeign(['car_makes_id']);

            // 2. rename column
            $table->renameColumn('car_makes_id', 'car_make_id');

            // 3. re-add foreign key
            $table->foreign('car_make_id')
                  ->references('id')
                  ->on('tblcar_makes')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('tblcar_models', function (Blueprint $table) {

            $table->dropForeign(['car_make_id']);

            $table->renameColumn('car_make_id', 'car_makes_id');

            $table->foreign('car_makes_id')
                  ->references('id')
                  ->on('tblcar_makes')
                  ->onDelete('cascade');
        });
    }
};