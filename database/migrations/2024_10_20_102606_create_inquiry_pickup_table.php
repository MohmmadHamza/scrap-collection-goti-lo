<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryPickupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_pickup', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('inquiry_assigned_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('inquiry_assigned_id')->references('id')->on('inquiry_assigned')->onDelete('cascade');

            // Pickup fields
            $table->timestamp('schedule_date')->nullable(); // Allow null if scheduling is not always required
            $table->enum('status', ['Pending', 'In Process', 'Completed', 'Cancelled']); // Define the appropriate statuses
            $table->decimal('amount', 10, 2)->nullable(); // Nullable amount
            $table->text('description')->nullable(); // Allow null descriptions

            // Timestamps
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at

            // Created by and updated by (optional)
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Foreign key constraints for created_by and updated_by (optional)
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiry_pickup');
    }
}
