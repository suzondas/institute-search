<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionwiseStudentSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectionwise_student_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('SECTION_ID',5)->nullable();
            $table->integer('SIX',4)->nullable();
            $table->integer('SEVEN',4)->nullable();
            $table->integer('EIGHT',4)->nullable();
            $table->integer('NINE_SCIENCE',4)->nullable();
            $table->integer('NINE_ARTS',4)->nullable();
            $table->integer('NINE_COMMERCE',4)->nullable();
            $table->integer('TEN_SCIENCE',4)->nullable();
            $table->integer('TEN_ARTS',4)->nullable();
            $table->integer('TEN_COMMERCE',4)->nullable();
            $table->integer('NINE_GENERAL',4)->nullable();
            $table->integer('NINE_BUSINESS',4)->nullable();
            $table->integer('NINE_MOZZABID',4)->nullable();
            $table->integer('NINE_HIFZUL',4)->nullable();
            $table->integer('TEN_GENERAL',4)->nullable();
            $table->integer('TEN_MOZZABID',4)->nullable();
            $table->integer('TEN_HIFZUL',4)->nullable();
            $table->integer('TEN_BUSINESS',4)->nullable();
            $table->integer('TOTAL',4)->nullable();
            $table->integer('PERMITTED',4)->nullable();
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
        Schema::dropIfExists('sectionwise_student_summaries');
    }
}
