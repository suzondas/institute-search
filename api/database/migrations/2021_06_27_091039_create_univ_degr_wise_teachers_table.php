<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivDegrWiseTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_degr_wise_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('DEGREE_ID',10)->nullable();
            $table->string('DEGREE_NAME',255)->nullable();
            $table->integer('TOTAL_TEACHER_FULL',10)->nullable();
            $table->integer('FEMALE_TEACHER_FULL',10)->nullable();
            $table->string('TOTAL_TEACHER_PART',255)->nullable();
            $table->string('FEMALE_TEACHER_PART',255)->nullable();
            $table->integer('year',4)->nullable();
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
        Schema::dropIfExists('univ_degr_wise_teachers');
    }
}
