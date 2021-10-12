<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultOpenUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_open_universities', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('NINE_STD',5)->nullable();
            $table->integer('NINE_FEMALE',5)->nullable();
            $table->integer('NINE_PASS',5)->nullable();
            $table->integer('NINE_FEM_PASS',5)->nullable();
            $table->integer('TEN_STD',5)->nullable();
            $table->integer('TEN_FEM_STD',5)->nullable();
            $table->integer('TEN_PASS',5)->nullable();
            $table->integer('TEN_FEM_PASS',5)->nullable();
            $table->integer('ELEVEN_STD',5)->nullable();
            $table->integer('ELEVEN_FEM_STD',5)->nullable();
            $table->integer('ELEVEN_PASS',5)->nullable();
            $table->integer('ELEVEN_FEM_PASS',5)->nullable();
            $table->integer('TWELVE_STD',5)->nullable();
            $table->integer('TWELVE_FEM_STD',5)->nullable();
            $table->integer('TWELVE_PASS',5)->nullable();
            $table->integer('TWELVE_FEM_PASS',5)->nullable();
            $table->integer('HONOURS_P_STD',5)->nullable();
            $table->integer('HONOURS_P_FEM_STD',5)->nullable();
            $table->integer('HONOURS_P_PASS',5)->nullable();
            $table->integer('HONOURS_P_FEM_PASS',5)->nullable();
            $table->integer('HONOURS_STD',5)->nullable();
            $table->integer('HONOURS_FEM_STD',5)->nullable();
            $table->integer('HONOURS_PASS',5)->nullable();
            $table->integer('HONOURS_FEM_PASS',5)->nullable();
            $table->integer('MASTERS_STD',5)->nullable();
            $table->integer('MASTERS_FEMALE',5)->nullable();
            $table->integer('MASTERS_PASS',5)->nullable();
            $table->integer('MASTERS_FEM_PASS',5)->nullable();
            $table->integer('OTHERS_STD',5)->nullable();
            $table->integer('OTHERS_FEMALE',5)->nullable();
            $table->integer('OTHERS_PASS',5)->nullable();
            $table->integer('OTHERS_FEM_PASS',5)->nullable();
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
        Schema::dropIfExists('result_open_universities');
    }
}
