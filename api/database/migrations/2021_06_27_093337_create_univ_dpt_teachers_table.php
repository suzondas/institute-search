<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivDptTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_dpt_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('DEPT_ID',10)->nullable();
            $table->integer('SUBJECT_ID',10)->nullable();
            $table->string('DEPT_NAME',255)->nullable();
            $table->string('SUBJECT_NAME',255)->nullable();
            $table->integer('TOTAL_PROF',10)->nullable();
            $table->integer('FEMALE_PROF',10)->nullable();
            $table->integer('PTIME_PROF',10)->nullable();
            $table->integer('TOTAL_ASSO_PROF',10)->nullable();
            $table->integer('FEMALE_ASSO_PROF',10)->nullable();
            $table->integer('PTIME_ASSO_PROF',10)->nullable();
            $table->integer('TOTAL_ASSIT_PROF',10)->nullable();
            $table->integer('FEMALE_ASSIT_PROF',10)->nullable();
            $table->integer('PTIME_ASSIT_PROF',10)->nullable();
            $table->integer('TOTAL_LECTURER',10)->nullable();
            $table->integer('FEMALE_LECTURER',10)->nullable();
            $table->integer('PTIME_LECTURER',10)->nullable();
            $table->integer('TOTAL_HIGHER_EDU',10)->nullable();
            $table->integer('FEMALE_HIGHER_EDU',10)->nullable();
            $table->integer('PTIME_HIGHER_EDU',10)->nullable();
            $table->integer('MFIL_HIGHER_EDU',10)->nullable();
            $table->integer('PHD_HIGHER_EDU',10)->nullable();
            $table->integer('OTHERS_HIGHER_EDU',10)->nullable();
            $table->integer('MFIL_FEMALE_HIGHER_EDU',10)->nullable();
            $table->integer('PHD_FEMALE_HIGHER_EDU',10)->nullable();
            $table->integer('OTHERS_FEMALE_HIGHER_EDU',10)->nullable();
            $table->string('DEPT_DETAILS',500)->nullable();
            $table->string('SUBJECT_DETAILS',500)->nullable();
            $table->string('FACULTY_NAME',500)->nullable();
            $table->integer('TOTAL_FORIGNE',10)->nullable();
            $table->integer('FEMALE_FORIGNE',10)->nullable();
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
        Schema::dropIfExists('univ_dpt_teachers');
    }
}
