<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ParentInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_info', function (Blueprint $table){
            $table->unsignedInteger('applicant_id')->primary()->autoIncrement();
            $table->string('mother_name_surname')->nullable();
            $table->string('mother_number')->nullable();
            $table->string('father_name_surname')->nullable();
            $table->string('father_number')->nullable();
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
