<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryAssignedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_assigned', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('inquiry_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('inquiry_id')->references('id')->on('inquiries')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Inquiry assignment fields
            $table->enum('status', [
                'Pending',
                'In Process',
                'Completed',
                'Cancelled',
                'Closed'
            ]);
            $table->decimal('amount', 10, 2)->nullable();
            $table->text('description')->nullable(); // Allow null description if needed

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
        Schema::dropIfExists('inquiry_assigned');
    }
}
