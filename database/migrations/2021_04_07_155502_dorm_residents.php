<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DormResidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorm_residents', function (Blueprint $table){
            $table->unsignedInteger('applicant_id')->primary();
            $table->integer('is_active');
            $table->integer('deposit');
            $table->integer('deposit_status');
            $table->string('room_id');
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
