<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');

            // Inquiry fields
            $table->enum('status', [
                'Awaiting Response from Vendor',
                'Awaiting Response from Zolio',
                'In Process',
                'Awaiting Customer Confirmation',
                'Pickup Scheduled',
                'Completed',
                'Cancelled',
                'Closed'
            ]);
            $table->enum('zolio_status', [
                'Pending',
                'In Process',
                'Completed',
                'Cancelled',
                'Closed'
            ])->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->decimal('cgst', 10, 2)->nullable();
            $table->decimal('sgst', 10, 2)->nullable();
            $table->decimal('igst', 10, 2)->nullable();
            $table->decimal('cgst_per', 5, 2)->nullable();
            $table->decimal('sgst_per', 5, 2)->nullable();
            $table->decimal('igst_per', 5, 2)->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('grand_total', 10, 2)->nullable();
            $table->string('barcode')->nullable();
            $table->enum('payment_type', ['voucher', 'exchange', 'Cash'])->nullable();

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
        Schema::dropIfExists('inquiries');
    }
}
