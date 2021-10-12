<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicTradeStdSumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_trade_std_sums', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('CUR_ID',2)->nullable();
            $table->string('TRADE_CODE',5)->nullable();
            $table->string('TRADE_NAME',50)->nullable();
            $table->integer('BAS_3MOTN_TOT',5)->nullable();
            $table->integer('BAS_3MOTN_FEM',5)->nullable();
            $table->integer('BAS_6MOTN_TOT',5)->nullable();
            $table->integer('BAS_6MOTN_FEM',5)->nullable();
            $table->integer('BAS_1YR_TOT',5)->nullable();
            $table->integer('BAS_1YR_FEM',5)->nullable();
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
        Schema::dropIfExists('basic_trade_std_sums');
    }
}
