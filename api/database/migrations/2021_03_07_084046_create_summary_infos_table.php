<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('TEAC_APEAR_USE',1)->nullable();
            $table->string('TEAC_SELF_APEAR_USE',1)->nullable();
            $table->string('GLOBES',1)->nullable();
            $table->string('MAPS',1)->nullable();
            $table->string('POSTER',1)->nullable();
            $table->string('MODEL',1)->nullable();
            $table->string('FLIP_CHART',1)->nullable();
            $table->string('OTHEREQU',1)->nullable();
            $table->string('EDUCATION_PLAN_YN',1)->nullable();
            $table->string('CREATIVE_QUES_PREPAIRED_YN',1)->nullable();
            $table->integer('WEEKLY_CLASS_NUM',3)->nullable();
            $table->string('ADDITIONAL_CLASS_YN',1)->nullable();
            $table->string('ADDITIONAL_CLASS_TIME',2)->nullable();
            $table->integer('PER_PERIOD_TIME',3)->nullable();
            $table->integer('LAB_HR',3)->nullable();
            $table->string('APPARATUS_NAME1',100)->nullable();
            $table->string('APPARATUS_NAME2',100)->nullable();
            $table->string('APPARATUS_NAME3',100)->nullable();
            $table->string('APPARATUS_NAME4',100)->nullable();
            $table->string('CHEMICAL_NAME1',100)->nullable();
            $table->string('CHEMICAL_NAME2',100)->nullable();
            $table->string('CHEMICAL_NAME3',100)->nullable();
            $table->string('CHEMICAL_NAME4',100)->nullable();
            $table->string('EDU_IMPROVE_STAP1',100)->nullable();
            $table->string('EDU_IMPROVE_STAP2',100)->nullable();
            $table->string('EDU_IMPROVE_STAP3',100)->nullable();
            $table->string('EDU_IMPROVE_STAP4',100)->nullable();
            $table->string('SYLABUS_OPINION',2)->nullable();
            $table->string('TEACHER_DIARY_YN',2)->nullable();
            $table->string('AWARNESS_PROG_YN',1)->nullable();
            $table->string('REGULAR_STUDENT_ASSELY_YN',1)->nullable();
            $table->string('DIVASIK_EDUCATION',1)->nullable();
            $table->string('OWN_DIVASIK_YN',1)->nullable();
            $table->string('DIVASIK_LAN',3)->nullable();
            $table->integer('WORKING_DAY_LASTYR',3)->nullable();
            $table->string('COMM_INTERACTION_YN',1)->nullable();
            $table->string('DRUG_TERROR_YN',1)->nullable();
            $table->string('TERROR_YN',1)->nullable();
            $table->string('JONGI_YN',1)->nullable();
            $table->string('SAFE_ROAD_YN',1)->nullable();
            $table->string('INTEGRITY_STRATGY_YN',1)->nullable();
            $table->string('INNOVATION_YN',1)->nullable();
            $table->string('MORALITY_CLASS_YN',1)->nullable();
            $table->string('SUCCESS_STD_LIST_YN',1)->nullable();
            $table->string('CHILD_MARR_PREV_YN',1)->nullable();
            $table->string('PHYSICAL_EXERCISE_YN',1)->nullable();
            $table->string('ANNUAL_EDU_TOUR_YN',1)->nullable();
            $table->string('ANNUAL_GARDENING_YN',1)->nullable();
            $table->string('CO_CURRICULAR_ACT_YN',1)->nullable();
            $table->string('MILAD',1)->nullable();
            $table->string('ANUAL_SPORTS',1)->nullable();
            $table->string('ANUAL_CULTURAL',1)->nullable();
            $table->string('DIBET',1)->nullable();
            $table->string('CRICKET',1)->nullable();
            $table->string('FOOTBALL',1)->nullable();
            $table->string('VOOLYBALL',1)->nullable();
            $table->string('HANDBALL',1)->nullable();
            $table->string('INDOREGAMES',1)->nullable();
            $table->string('KARAM',1)->nullable();
            $table->string('MUSIC',1)->nullable();
            $table->string('KABADI',1)->nullable();
            $table->string('PLANTING',1)->nullable();
            $table->string('DRAMA',1)->nullable();
            $table->string('SCIENCEFAIR',1)->nullable();
            $table->string('POETRY',1)->nullable();
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
        Schema::dropIfExists('summary_infos');
    }
}
