<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // Product fields
            $table->string('name'); // Product name
            $table->string('code')->unique(); // Unique product code
            $table->text('description')->nullable(); // Nullable description
            $table->decimal('price', 10, 2); // Price of the product
            $table->decimal('discount', 10, 2)->nullable(); // Nullable discount
            $table->integer('stock_quantity'); // Quantity in stock
            $table->enum('status', ['active', 'inactive']); // Product status
            $table->boolean('is_featured')->default(false); // Featured product flag
            $table->string('tags')->nullable(); // Nullable tags
            $table->decimal('voucher_discount', 10, 2)->nullable(); // Nullable voucher discount
            $table->decimal('exchange_discount', 10, 2)->nullable(); // Nullable exchange discount

            // Timestamps
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
