<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_exam_results', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('EXAM_ID',15)->unsigned();
            $table->foreign('EXAM_ID')->references('EXAM_ID')->on('LOOKUP_EXAM_NAME');
            $table->string('SUBJECT',20)->nullable();
            $table->integer('REGISTERED_TOTAL',4)->nullable();
            $table->integer('REGISTERD_FEMALE',4)->nullable();
            $table->integer('TOTAL_CANDIDATE',4)->nullable();
            $table->integer('FEMALE_CANDIDATE',4)->nullable();
            $table->integer('A_PLUS_TOTAL',4)->nullable();
            $table->integer('A_PLUS_GIRLS',4)->nullable();
            $table->integer('A_TOTAL',4)->nullable();
            $table->integer('A_GIRLS',4)->nullable();
            $table->integer('A_MINUS_TOTAL',4)->nullable();
            $table->integer('A_MINUS_GIRLS',4)->nullable();
            $table->integer('B_TOTAL',4)->nullable();
            $table->integer('B_GIRLS',4)->nullable();
            $table->integer('C_TOTAL',4)->nullable();
            $table->integer('C_GIRLS',4)->nullable();
            $table->integer('D_TOTAL',4)->nullable();
            $table->integer('D_GIRLS',4)->nullable();
            $table->integer('TOTAL_PASS',4)->nullable();
            $table->integer('GIRLS_PASS',4)->nullable();
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
        Schema::dropIfExists('board_exam_results');
    }
}
