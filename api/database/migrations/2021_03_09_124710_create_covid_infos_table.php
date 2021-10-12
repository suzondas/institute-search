<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('ONLINE_CLASS_YN',1)->nullable();
            $table->string('TELE_MONITORING_YN',1)->nullable();
            $table->string('LOCKDOWN_NO_ACTION_YN',1)->nullable();
            $table->string('ONLINE_EXAM_YN',1)->nullable();
            $table->string('TV_PROG_STD_PARTICIPANT',100)->nullable();
            $table->integer('INFECTED_STD_TOTAL',4)->nullable();
            $table->integer('INFECTED_STD_GIRL',4)->nullable();
            $table->integer('INFECTED_TEA_TOTAL',4)->nullable();
            $table->integer('INFECTED_TEA_FEMALE',4)->nullable();
            $table->integer('INFECTED_STAFF_TOTAL',4)->nullable();
            $table->integer('INFECTED_STAFF_FEMALE',4)->nullable();
            $table->integer('DIED_STD_TOTAL',4)->nullable();
            $table->integer('DIED_STD_GIRL',4)->nullable();
            $table->integer('DIED_TEA_TOTAL',4)->nullable();
            $table->integer('DIED_TEA_FEMALE',4)->nullable();
            $table->integer('DIED_STAFF_TOTAL',4)->nullable();
            $table->integer('DIED_STAFF_FEMALE',4)->nullable();
            $table->string('CLASS_START_YN',1)->nullable();
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
        Schema::dropIfExists('covid_infos');
    }
}
