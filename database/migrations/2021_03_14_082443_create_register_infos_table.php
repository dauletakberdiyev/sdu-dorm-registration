<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorm_register_info', function (Blueprint $table) {
            $table->integer('applicant_id')->unsigned()->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father');
            $table->date('birth_date');
            $table->string('city');
            $table->string('type_of_study');
            $table->string('faculty_code');
            $table->string('program_code');
            $table->integer('course');
            $table->string('school');
            $table->string('address');
            $table->string('father_number');
            $table->string('mother_number');
            $table->string('self_number');
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
        Schema::dropIfExists('register_infos');
    }
}
