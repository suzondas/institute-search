<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectwiseStudentSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectwise_student_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('SUBJECT_ID',3)->unsigned();
            $table->foreign('SUBJECT_ID')->references('SUBJECT_ID')->on('subjects');
            $table->integer('TOTAL_TEACHER',5)->nullable();
            $table->integer('TOTAL_TEACHER_FEMALE',5)->nullable();
            $table->integer('SIX',5)->nullable();
            $table->integer('SIX_FEMALE',5)->nullable();
            $table->integer('SEVEN',5)->nullable();
            $table->integer('SEVEN_FEMALE',5)->nullable();
            $table->integer('EIGHT',5)->nullable();
            $table->integer('EIGHT_FEMALE',5)->nullable();
            $table->integer('NINE',5)->nullable();
            $table->integer('NINE_FEMALE',5)->nullable();
            $table->integer('TEN',5)->nullable();
            $table->integer('TEN_FEMALE',5)->nullable();
            $table->integer('HSC',5)->nullable();
            $table->integer('HSC_FEMALE',5)->nullable();
            $table->integer('HONOURS_PASS',5)->nullable();
            $table->integer('HONOURS_PASS_FEMALE',5)->nullable();
            $table->integer('HONOURS',5)->nullable();
            $table->integer('HONOURS_FEMALE',5)->nullable();
            $table->integer('PR_MASTERS',5)->nullable();
            $table->integer('PR_MASTERS_FEMALE',5)->nullable();
            $table->integer('MASTERS',5)->nullable();
            $table->integer('MASTERS_FEMALE',5)->nullable();
            $table->integer('YEAR',4)->nullable();
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
        Schema::dropIfExists('subjectwise_student_summaries');
    }
}
