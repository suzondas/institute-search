<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHscbmStudentSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hscbm_student_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('CUR_ID',2)->nullable();
            $table->string('TRADE_CODE',5)->nullable();
            $table->string('TRADE_NAME',50)->nullable();
            $table->integer('ELEVEN_TOTAL',5)->nullable();
            $table->integer('ELEVEN_FEMALE',5)->nullable();
            $table->integer('TWELVE_TOTAL',5)->nullable();
            $table->integer('TWELVE_FEMALE',5)->nullable();
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
        Schema::dropIfExists('hscbm_student_summaries');
    }
}
