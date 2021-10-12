<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('EDUCATION_LEVEL_ID',2);
            $table->foreign('EDUCATION_LEVEL_ID')->references('EDUCATION_LEVEL_ID')->on('lookup_education_levels');
            $table->string('CLASS_ID',4);
            $table->foreign('CLASS_ID')->references('CLASS_ID')->on('classes');
            $table->string('GROUP_ID',4)->nullable();
            $table->foreign('GROUP_ID')->references('GROUP_ID')->on('groups');
            $table->integer('SEAT',5)->nullable();
            $table->integer('TOTAL_STUDENT',5)->nullable();
            $table->integer('FEMALE_STUDENT',5)->nullable();
            $table->integer('TOTAL_PRESENT',5)->nullable();
            $table->integer('FEMALE_PRESENT',5)->nullable();
            $table->integer('TRANSFER_IN',3)->nullable();
            $table->integer('TRANSFER_OUT',3)->nullable();
            $table->integer('MALE_STIPEND',3)->nullable();
            $table->integer('FEMALE_STIPEND',3)->nullable();
            $table->integer('MALE_SCHOLARSHIP',3)->nullable();
            $table->integer('FEMALE_SCHOLARSHIP',3)->nullable();
            $table->integer('TOTAL_ENG',3)->nullable();
            $table->integer('FEMALE_ENG',3)->nullable();
            $table->integer('NEXTYR_BOOK_REG',5)->nullable();
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
        Schema::dropIfExists('students_summaries');
    }
}
