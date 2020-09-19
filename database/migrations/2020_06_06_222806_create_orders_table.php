<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->tinyInteger('minutes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_id');
            $table->tinyInteger('has_coupon')->nullable();
            $table->tinyInteger('coupon_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('validation_date')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('package_id')->references('id')->on('packages');
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
        Schema::dropIfExists('orders');
    }
}
