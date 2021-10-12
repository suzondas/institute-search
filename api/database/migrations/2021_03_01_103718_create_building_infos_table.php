<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('OLDEST_BUILDING_ESTAB_YEAR', 4)->nullable();
            $table->string('LATEST_BUILDING_ESTAB_YEAR', 4)->nullable();
            $table->string('LATEST_BUILDING_MONEY_SOURCE', 20)->nullable();
            $table->integer('TOTAL_BUILDING_AREA_SFT', 10)->nullable();
            $table->integer('LATEST_BUILDING_AREA_SFT', 10)->nullable();
            $table->string('INST_BUILDING_TYPE', 20)->nullable();
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
        Schema::dropIfExists('building_infos');
    }
}
