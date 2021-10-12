<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivDegreeWiseStdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_degree_wise_stds', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('DEGREE_ID',10)->nullable();
            $table->integer('SUBJECT_ID',10)->nullable();
            $table->string('DEGREE_NAME',255)->nullable();
            $table->string('SUBJECT_NAME',255)->nullable();
            $table->integer('TOTAL_STUDENT',10)->nullable();
            $table->integer('FEMALE_STUDENT',10)->nullable();
            $table->string('DEGREE_DETAILS',255)->nullable();
            $table->string('SUBJECT_DETAILS',255)->nullable();
            $table->integer('TOTAL_PASSED',10)->nullable();
            $table->integer('FEMALE_PASSED',10)->nullable();
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
        Schema::dropIfExists('univ_degree_wise_stds');
    }
}
