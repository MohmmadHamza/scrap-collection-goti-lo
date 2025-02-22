<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            // Primary key
            $table->bigIncrements('id');

            // Foreign keys
            $table->unsignedBigInteger('user_id'); // The user receiving the notification
            $table->unsignedBigInteger('from_user_id')->nullable(); // The user sending the notification
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('set null');

            // Notification fields
            $table->string('type_name');
            $table->bigInteger('type_id')->nullable(); // Could reference other entities (e.g., orders, messages)
            $table->string('title');
            $table->text('description');
            $table->boolean('is_read')->default(false);
            $table->enum('delivery_method', ['EMAIL', 'SMS', 'IN_APP', 'PUSH']);
            $table->timestamp('read_at')->nullable();

            // Timestamps
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
