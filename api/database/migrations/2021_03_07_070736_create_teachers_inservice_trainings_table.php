<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersInserviceTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Teachers_inservice_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('HT_TRAINING_YN',1)->nullable();
            $table->string('HT_FL_TRAINING_YN',1)->nullable();
            $table->string('HT_PRSERV_TRAINING_YN',1)->nullable();
            $table->integer('STC_TRAINING_TOTAL',4)->nullable();
            $table->integer('STC_TRAINING_FEMALE',4)->nullable();
            $table->integer('stt_bed_total',4)->nullable();
            $table->integer('stt_bed_female',4)->nullable();
            $table->integer('CPD1_TOTAL',4)->nullable();
            $table->integer('CPD1_FEMALE',4)->nullable();
            $table->integer('CPD1_ENG_TOTAL',4)->nullable();
            $table->integer('CPD1_ENG_FEMALE',4)->nullable();
            $table->integer('CPD2_TOTAL',4)->nullable();
            $table->integer('CPD2_FEMALE',4)->nullable();
            $table->integer('CPD14_TOTAL',4)->nullable();
            $table->integer('CPD14_FEMALE',4)->nullable();
            $table->integer('CLUSTER_TOTAL',4)->nullable();
            $table->integer('CLUSTER_FEMALE',4)->nullable();
            $table->integer('SBA_TOTAL',4)->nullable();
            $table->integer('SBA_FEMALE',4)->nullable();
            $table->integer('SRIZONSIL_TOTAL',4)->nullable();
            $table->integer('SRIZONSIL_FEMALE',4)->nullable();
            $table->integer('OTHER_TOTAL',4)->nullable();
            $table->integer('OTHER_FEMALE',4)->nullable();
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
        Schema::dropIfExists('Teachers_inservice_trainings');
    }
}
