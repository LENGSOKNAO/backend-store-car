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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_roles_id')->constrained('user_roles');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('fullname');
            $table->string('avatar_url');
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_dealer')->default(false);
            $table->string('dealer_name');
            $table->string('loaction');
            $table->timestamp('join_date');
            $table->timestamp('last_active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
