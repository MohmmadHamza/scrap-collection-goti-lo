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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable(); // Add role_id
            $table->date('dob')->nullable(); // Add date of birth
            $table->enum('gender', ['male', 'female'])->nullable(); // Add gender
            $table->string('profile_picture')->nullable(); // Add profile picture
            $table->string('state_id')->nullable(); // Add state
            $table->string('city_id')->nullable(); // Add city
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role_id', 'dob', 'gender', 'profile_picture', 'state_id', 'city_id']);
        });
    }
};
