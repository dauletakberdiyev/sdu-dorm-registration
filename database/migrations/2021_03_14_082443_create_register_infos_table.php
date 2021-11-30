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
            $table->unsignedInteger('applicant_id')->primary()->autoIncrement();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father')->nullable();
            $table->date('birth_date');
            $table->integer('gender');
            $table->integer('iin');
            $table->string('city');
            $table->string('faculty_code');
            $table->string('program_code');
            $table->integer('course');
            $table->string('school');
            $table->string('address');
            $table->string('self_number');
            $table->string('passport_path');
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
