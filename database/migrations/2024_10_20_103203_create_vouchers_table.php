<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('inquiry_id')->nullable();
            $table->unsignedBigInteger('inquiry_assigned_id')->nullable();
            $table->unsignedBigInteger('inquiry_pickup_id')->nullable();

            $table->foreign('inquiry_id')->references('id')->on('inquiries')->onDelete('set null');
            $table->foreign('inquiry_assigned_id')->references('id')->on('inquiry_assigned')->onDelete('set null');
            $table->foreign('inquiry_pickup_id')->references('id')->on('inquiry_pickup')->onDelete('set null');

            // Voucher fields
            $table->decimal('amount', 10, 2); // Amount must be defined
            $table->string('code')->unique(); // Code should be unique
            $table->text('description')->nullable(); // Nullable description
            $table->text('notes')->nullable(); // Nullable notes
            $table->string('image')->nullable(); // Nullable image URL
            $table->enum('discount_type', ['PERCENTAGE', 'FIXED']); // Define discount types
            $table->decimal('min_order_amount', 10, 2)->nullable(); // Nullable minimum order amount
            $table->decimal('max_discount_amount', 10, 2)->nullable(); // Nullable maximum discount amount
            $table->timestamp('valid_from')->nullable(); // Nullable valid from date
            $table->timestamp('valid_until')->nullable(); // Nullable valid until date
            $table->enum('status', ['active', 'inactive', 'redeemed','expired']); // Define status options

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
        Schema::dropIfExists('vouchers');
    }
}
