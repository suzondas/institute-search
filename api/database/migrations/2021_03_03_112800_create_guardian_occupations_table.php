<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardianOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_occupations', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('OCCUPATION_ID',2)->unsigned();
            $table->foreign('OCCUPATION_ID')->references('OCCUPATION_ID')->on('LOOKUP_GUARDIAN_OCCUPATION');
            $table->integer('SIX',4)->nullable();
            $table->integer('SEVEN',4)->nullable();
            $table->integer('EIGHT',4)->nullable();
            $table->integer('NINE',4)->nullable();
            $table->integer('TEN',4)->nullable();
            $table->integer('HSC',4)->nullable();
            $table->integer('HONOURS_PASS',4)->nullable();
            $table->integer('HONOURS_SOMMAN',4)->nullable();
            $table->integer('MASTERS',4)->nullable();
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
        Schema::dropIfExists('guardian_occupations');
    }
}
