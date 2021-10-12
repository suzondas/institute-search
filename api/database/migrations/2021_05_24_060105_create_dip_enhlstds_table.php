<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDipEnhlstdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dip_enhlstds', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('CUR_ID',2)->nullable();
            $table->string('TRADE_CODE',5)->nullable();
            $table->string('TRADE_NAME',50)->nullable();
            $table->integer('FRST_SEM_TOTAL',5)->nullable();
            $table->integer('FRST_SEM_FEMALE',5)->nullable();
            $table->integer('SEC_SEM_TOTAL',5)->nullable();
            $table->integer('SEC_SEM_FEMALE',5)->nullable();
            $table->integer('THRD_SEM_TOTAL',5)->nullable();
            $table->integer('THRD_SEM_FEMALE',5)->nullable();
            $table->integer('FRTH_SEM_TOTAL',5)->nullable();
            $table->integer('FRTH_SEM_FEMALE',5)->nullable();
            $table->integer('FIF_SEM_TOTAL',5)->nullable();
            $table->integer('FIF_SEM_FEMALE',5)->nullable();
            $table->integer('SIX_SEM_TOTAL',5)->nullable();
            $table->integer('SIX_SEM_FEMALE',5)->nullable();
            $table->integer('SEVEN_SEM_TOTAL',5)->nullable();
            $table->integer('SEVEN_SEM_FEMALE',5)->nullable();
            $table->integer('EIGHT_SEM_TOTAL',5)->nullable();
            $table->integer('EIGHT_SEM_FEMALE',5)->nullable();
            $table->integer('TOTAL_CANDIDATE',5)->nullable();
            $table->integer('GIRLS_CANDIDATE',5)->nullable();
            $table->integer('TOTAL_PASS',5)->nullable();
            $table->integer('GIRLS_PASS',5)->nullable();
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
        Schema::dropIfExists('dip_enhlstds');
    }
}
