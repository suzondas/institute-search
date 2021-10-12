<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('NO_BUILDING_1FLOOR',3)->nullable();
            $table->integer('NO_BUILDING_2FLOOR',3)->nullable();
            $table->integer('NO_BUILDING_3FLOOR',3)->nullable();
            $table->integer('NO_BUILDING_4FLOOR',3)->nullable();
            $table->integer('NO_BUILDING_5FLOOR',3)->nullable();
            $table->integer('NO_BUILDING_5PLUS_FLOOR',3)->nullable();
            $table->integer('OWN_BUILDING',3)->nullable();
            $table->integer('NO_BUILDING',3)->nullable();
            $table->integer('RENTED',3)->nullable();
            $table->integer('PACKA',3)->nullable();
            $table->integer('SEMI_PACKA',3)->nullable();
            $table->integer('KANCHA',3)->nullable();
            $table->integer('NEW_BUILDING',3)->nullable();
            $table->integer('OLD_BUILDING',3)->nullable();
            $table->integer('DAMAGE',3)->nullable();
            $table->integer('ABANDONED',3)->nullable();
            $table->integer('CLASS_ROOM',3)->nullable();
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
        Schema::dropIfExists('building_numbers');
    }
}
