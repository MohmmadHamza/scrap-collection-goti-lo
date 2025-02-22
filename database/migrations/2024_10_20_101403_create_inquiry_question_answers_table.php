<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry_question_answers', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('inquiry_id');
            $table->unsignedBigInteger('question_id');
            $table->foreign('inquiry_id')->references('id')->on('inquiries')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('inquiry_questions')->onDelete('cascade');

            // Answer fields
            $table->text('answer_text')->nullable(); // Allow null answers if needed
            $table->enum('question_type', ['mcq', 'brand', 'text', 'image', 'video', 'document', 'long_text', 'select', 'numeric']);

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
        Schema::dropIfExists('inquiry_question_answers');
    }
}
