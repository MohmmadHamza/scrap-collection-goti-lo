<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_questions', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign key to subcategories table
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');

            // Inquiry question fields
            $table->text('question_text');
            $table->enum('question_type', ['mcq', 'brand', 'text', 'image', 'video', 'document', 'long_text', 'select', 'numeric']);
            $table->json('options')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort_order')->default(0);

            // Timestamps
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at

            // Created by and updated by (optional)
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // Foreign key constraints (optional)
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
        Schema::dropIfExists('inquiry_questions');
    }
}
