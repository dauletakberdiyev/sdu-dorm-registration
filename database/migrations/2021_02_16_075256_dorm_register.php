<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DormRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dorm_register', function (Blueprint $table){
           $table->increments('applicant_id');
           $table->string('applicant_email');
           $table->string('password');
           $table->string('check_path');
           $table->string('status');
           $table->integer('registration_year');
           $table->integer('registration_term');
           $table->timestamp('registration_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
