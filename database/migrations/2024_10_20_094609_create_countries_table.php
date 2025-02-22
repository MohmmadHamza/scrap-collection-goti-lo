<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Country fields
            $table->string('code', 25)->unique();
            $table->string('name', 255);
            $table->string('iso_alpha_3', 3)->nullable();
            $table->integer('numeric_code')->nullable();
            $table->string('currency_code', 25)->nullable();
            $table->string('currency_name', 55)->nullable();
            $table->string('phone_code', 5)->nullable();
            $table->string('region', 55)->nullable();

            // Status with ENUM type (active/inactive)
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Timestamps for created, updated, and deleted records
            $table->timestamps(); // This will create 'created_at' and 'updated_at'
            $table->softDeletes(); // This will create 'deleted_at'

            // Created by and updated by
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Foreign key constraints (optional if you have a users table)
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
