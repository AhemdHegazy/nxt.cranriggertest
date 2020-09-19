<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('value');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('option_id');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
