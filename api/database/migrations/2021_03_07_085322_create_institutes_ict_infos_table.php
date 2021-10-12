<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesIctInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes_ict_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('COMPUTER_TEACHING_YN',1)->nullable();
            $table->string('COMP_TEACHER_YN',1)->nullable();
            $table->string('COMP_TEACHER_QUAL',2)->nullable();
            $table->string('COMP_TEACHER_OTHER_EDU',2)->nullable();
            $table->string('COMP_TRAINING_TYPE',2)->nullable();
            $table->string('TEA_SOCITY_MEMBER_YN',1)->nullable();
            $table->integer('TEA_SOCITY_MEMBER_TOTAL',3)->nullable();
            $table->integer('TEA_SOCITY_MEMBER_FEMALE',3)->nullable();
            $table->integer('COMP_LAB_DAILY_USE_HR',3)->nullable();
            $table->string('DIGITAL_ATTENDANCE_STD',1)->nullable();
            $table->string('DIGITAL_ATTENDANCE_STAFF',1)->nullable();
            $table->string('DIGITAL_ATTENDANCE_YN',1)->nullable();
            $table->string('ELECTRICITY_YN',1)->nullable();
            $table->string('ELECTRICITY_CONN',1)->nullable();
            $table->string('SOLAR_PANNEL_CONN',1)->nullable();
            $table->string('GENERATOR_CONN',1)->nullable();
            $table->string('OTHER_CONN',1)->nullable();
            $table->string('SOLAR_PANEL_YN',1)->nullable();
            $table->integer('SOLAR_FAN',2)->nullable();
            $table->integer('SOLAR_LIGHT',2)->nullable();
            $table->string('INTERNET_CONN_YN',1)->nullable();
            $table->string('INTERNET_CONN_TYPE',50)->nullable();
            $table->integer('BANDWITH_MPBS',4)->nullable();
            $table->string('WIFI_YN',1)->nullable();
            $table->string('PADAGO_COMPUTER_YN',1)->nullable();
            $table->integer('DSKTOP_PADAGOGICAL',4)->nullable();
            $table->integer('LAPTOP_PADAGOGICAL',4)->nullable();
            $table->integer('PADAGOGICAL_COMPUTER',4)->nullable();
            $table->string('PADAGO_INTERNET_YN',1)->nullable();
            $table->string('PADAGO_INTERNET_STD',1)->nullable();
            $table->string('PADAGO_INTERNET_TEA',1)->nullable();
            $table->string('PADAGO_INTERNET_STD_TEA',1)->nullable();
            $table->string('BASIC_COURSE_YN',1)->nullable();
            $table->integer('BASIC_COURSE_TOTAL_6TO8',4)->nullable();
            $table->integer('BASIC_COURSE_FEMALE_6TO8',4)->nullable();
            $table->integer('BASIC_COURSE_TOTAL_9TO10',4)->nullable();
            $table->integer('BASIC_COURSE_FEMALE_9TO10',4)->nullable();
            $table->integer('BASIC_COURSE_TOTAL_11TO12',4)->nullable();
            $table->integer('BASIC_COURSE_FEMALE_11TO12',4)->nullable();
            $table->integer('BASIC_COURSE_HN_PASS',3)->nullable();
            $table->integer('BASIC_COURSE_HN_PASS_FEM',3)->nullable();
            $table->integer('BASIC_COURSE_HN',3)->nullable();
            $table->integer('BASIC_COURSE_HN_FEM',3)->nullable();
            $table->integer('BASIC_COURSE_MAS',3)->nullable();
            $table->integer('BASIC_COURSE_MAS_FEM',3)->nullable();
            $table->integer('CC_CAMERA_NUM',4)->nullable();
            $table->string('CC_CAMERA_YN',1)->nullable();
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
        Schema::dropIfExists('institutes_ict_infos');
    }
}
