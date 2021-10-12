<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicCrsSammariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_crs_sammaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('BAS_3MOTN_TOT',3)->nullable();
            $table->integer('BAS_3MOTN_FEM',3)->nullable();
            $table->integer('BAS_3MOTN_STIP_TOT',3)->nullable();
            $table->integer('BAS_3MOTN_STIP_FEM',3)->nullable();
            $table->integer('BAS_6MOTN_TOT',3)->nullable();
            $table->integer('BAS_6MOTN_FEM',3)->nullable();
            $table->integer('BAS_6MOTN_STIP_TOT',3)->nullable();
            $table->integer('BAS_6MOTN_STIP_FEM',3)->nullable();
            $table->integer('RTO_3MOTN_TOT',3)->nullable();
            $table->integer('RTO_3MOTN_FEM',3)->nullable();
            $table->integer('RTO_3MOTN_STIP_TOT',3)->nullable();
            $table->integer('RTO_3MOTN_STIP_FEM',3)->nullable();
            $table->integer('NTV_360_TOT',3)->nullable();
            $table->integer('NTV_360_FEM',3)->nullable();
            $table->integer('NTV_360_STIP_TOT',3)->nullable();
            $table->integer('NTV_360_STIP_FEM',3)->nullable();
            $table->integer('RPL_360_TOT',3)->nullable();
            $table->integer('RPL_360_FEM',3)->nullable();
            $table->integer('RPL_360_STIP_TOT',3)->nullable();
            $table->integer('RPL_360_STIP_FEM',3)->nullable();
            $table->integer('RPL_DAYS_TOT',3)->nullable();
            $table->integer('RPL_DAYS_FEM',3)->nullable();
            $table->integer('RPL_DAYS_STIP_TOT',3)->nullable();
            $table->integer('RPL_DAYS_STIP_FEM',3)->nullable();
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
        Schema::dropIfExists('basic_crs_sammaries');
    }
}
