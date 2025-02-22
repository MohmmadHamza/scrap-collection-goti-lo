<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_question_answers', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('product_questions')->onDelete('cascade');

            // Answer fields
            $table->text('answer_text'); // Text for the answer
            $table->enum('question_type', ['mcq', 'brand', 'text', 'image', 'video', 'document', 'long_text', 'select', 'numeric']); // Type of question

            // Timestamps
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at
            $table->unsignedBigInteger('created_by')->nullable(); // User who created the answer
            $table->unsignedBigInteger('updated_by')->nullable(); // User who last updated the answer
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_question_answers');
    }
}
