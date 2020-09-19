<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->longText('organization_pkg');
            $table->longText('organization_login');
            $table->longText('individual_pkg');
            $table->longText('individual_login');
            $table->longText('contacts');
            $table->longText('main_title');
            $table->longText('user_comments');
            $table->longText('numbers_section');
            $table->longText('exam_goals');
            $table->string('logo');
            $table->string('description');
            $table->string('address');
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
        Schema::dropIfExists('c_m_s');
    }
}
