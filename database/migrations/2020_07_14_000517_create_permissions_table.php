<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('subject_show')->default(0);
            $table->tinyInteger('subject_add')->default(0);
            $table->tinyInteger('subject_edit')->default(0);
            $table->tinyInteger('subject_delete')->default(0);
            $table->tinyInteger('package_show')->default(0);
            $table->tinyInteger('package_add')->default(0);
            $table->tinyInteger('package_edit')->default(0);
            $table->tinyInteger('package_delete')->default(0);
            $table->tinyInteger('question_show')->default(0);
            $table->tinyInteger('question_add')->default(0);
            $table->tinyInteger('question_edit')->default(0);
            $table->tinyInteger('question_delete')->default(0);
            $table->tinyInteger('post_show')->default(0);
            $table->tinyInteger('post_add')->default(0);
            $table->tinyInteger('post_edit')->default(0);
            $table->tinyInteger('post_delete')->default(0);
            $table->tinyInteger('country_show')->default(0);
            $table->tinyInteger('country_add')->default(0);
            $table->tinyInteger('country_edit')->default(0);
            $table->tinyInteger('country_delete')->default(0);
            $table->tinyInteger('coupon_show')->default(0);
            $table->tinyInteger('coupon_add')->default(0);
            $table->tinyInteger('coupon_edit')->default(0);
            $table->tinyInteger('coupon_delete')->default(0);
            $table->tinyInteger('guideline_show')->default(0);
            $table->tinyInteger('guideline_add')->default(0);
            $table->tinyInteger('guideline_edit')->default(0);
            $table->tinyInteger('guideline_delete')->default(0);
            $table->tinyInteger('members_show')->default(0);
            $table->tinyInteger('members_add')->default(0);
            $table->tinyInteger('members_edit')->default(0);
            $table->tinyInteger('members_delete')->default(0);
            $table->tinyInteger('payment_show')->default(0);
            $table->tinyInteger('payment_add')->default(0);
            $table->tinyInteger('payment_edit')->default(0);
            $table->tinyInteger('testimonial_show')->default(0);
            $table->tinyInteger('testimonial_delete')->default(0);
            $table->tinyInteger('cms_edit')->default(0);
            $table->tinyInteger('partner_show')->default(0);
            $table->tinyInteger('cms_show')->default(0);
            $table->tinyInteger('contacts_show')->default(0);
            $table->tinyInteger('grads_show')->default(0);
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('permissions');
    }
}
