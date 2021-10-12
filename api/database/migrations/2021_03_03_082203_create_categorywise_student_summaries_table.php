<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorywiseStudentSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorywise_student_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('CATEGORY_ID',4)->unsigned();
            $table->foreign('CATEGORY_ID')->references('CATEGORY_ID')->on('LOOKUP_CATEGORY_STUDENT');
            $table->integer('SIX_TOTAL',4)->nullable();
            $table->integer('SIX_FEMALE',4)->nullable();
            $table->integer('SEVEN_TOTAL',4)->nullable();
            $table->integer('SEVEN_FEMALE',4)->nullable();
            $table->integer('EIGHT_TOTAL',4)->nullable();
            $table->integer('EIGHT_FEMALE',4)->nullable();
            $table->integer('NINE_TOTAL',4)->nullable();
            $table->integer('NINE_FEMALE',4)->nullable();
            $table->integer('TEN_TOTAL',4)->nullable();
            $table->integer('TEN_FEMALE',4)->nullable();
            $table->integer('ELEVEN_TOTAL',4)->nullable();
            $table->integer('ELEVEN_FEMALE',4)->nullable();
            $table->integer('TWELVE_TOTAL',4)->nullable();
            $table->integer('TWELVE_FEMALE',4)->nullable();
            $table->integer('DEGREE1ST_TOTAL',4)->nullable();
            $table->integer('DEGREE1ST_FEMALE',4)->nullable();
            $table->integer('DEGREE2ND_TOTAL',4)->nullable();
            $table->integer('DEGREE2ND_FEMALE',4)->nullable();
            $table->integer('DEGREE3RD_TOTAL',4)->nullable();
            $table->integer('DEGREE3RD_FEMALE',4)->nullable();
            $table->integer('HONORS_TOTAL',4)->nullable();
            $table->integer('HONORS_FEMALE',4)->nullable();
            $table->integer('MASTERS_TOTAL',4)->nullable();
            $table->integer('MASTERS_FEMALE',4)->nullable();
            $table->integer('FAZIL_TOTAL',4)->nullable();
            $table->integer('FAZIL_FEMALE',4)->nullable();
            $table->integer('KAMIL_TOTAL',4)->nullable();
            $table->integer('KAMIL_FEMALE',4)->nullable();
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
        Schema::dropIfExists('categorywise_student_summaries');
    }
}
