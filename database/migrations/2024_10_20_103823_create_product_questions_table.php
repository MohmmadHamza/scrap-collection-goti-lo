<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_questions', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');

            // Question fields
            $table->text('question_text'); // Required question text
            $table->enum('question_type', ['mcq', 'brand', 'text', 'image', 'video', 'document', 'long_text', 'select', 'numeric']); // Type of question
            $table->json('options')->nullable(); // JSON for storing options, if applicable
            $table->enum('status', ['active', 'inactive']); // Status of the question
            $table->integer('sort_order')->default(0); // Sort order for displaying questions

            // Timestamps
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at
            $table->unsignedBigInteger('created_by')->nullable(); // User who created the question
            $table->unsignedBigInteger('updated_by')->nullable(); // User who last updated the question
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_questions');
    }
}
