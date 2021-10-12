<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivCrsWiseStdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_crs_wise_stds', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('COURSE_ID',10)->nullable();
            $table->string('COURSE_TYPE',255)->nullable();
            $table->string('COURSE_NAME',255)->nullable();
            $table->integer('TOTAL_STUDENT',10)->nullable();
            $table->integer('FEMALE_STUDENT',10)->nullable();
            $table->integer('year',4)->nullable();
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
        Schema::dropIfExists('univ_crs_wise_stds');
    }
}
