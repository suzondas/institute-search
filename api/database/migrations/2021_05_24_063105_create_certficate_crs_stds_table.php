<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertficateCrsStdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certficate_crs_stds', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('CUR_ID',2)->nullable();
            $table->string('TRADE_CODE',5)->nullable();
            $table->string('TRADE_NAME',50)->nullable();
            $table->integer('BAS_6MOTN_TOT',5)->nullable();
            $table->integer('BAS_6MOTN_FEM',5)->nullable();
            $table->integer('BAS_1YR_TOT',5)->nullable();
            $table->integer('BAS_1YR_FEM',5)->nullable();
            $table->integer('BAS_2YR_TOT',5)->nullable();
            $table->integer('BAS_2YR_FEM',5)->nullable();
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
        Schema::dropIfExists('certficate_crs_stds');
    }
}
