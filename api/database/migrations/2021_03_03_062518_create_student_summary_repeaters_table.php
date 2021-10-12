<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSummaryRepeatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_summary_repeaters', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('SIX_TOTAL',3)->nullable();
            $table->integer('SIX_FEMALE',3)->nullable();
            $table->integer('SEVEN_TOTAL',3)->nullable();
            $table->integer('SEVEN_FEMALE',3)->nullable();
            $table->integer('EIGHT_TOTAL',3)->nullable();
            $table->integer('EIGHT_FEMALE',3)->nullable();
            $table->integer('NINE_TOTAL',3)->nullable();
            $table->integer('NINE_FEMALE',3)->nullable();
            $table->integer('TEN_TOTAL',3)->nullable();
            $table->integer('TEN_FEMALE',3)->nullable();
            $table->integer('ELEVEN_TOTAL',3)->nullable();
            $table->integer('ELEVEN_FEMALE',3)->nullable();
            $table->integer('TWELVE_TOTAL',3)->nullable();
            $table->integer('TWELVE_FEMALE',3)->nullable();
            $table->integer('HONOURS_PASS_TOTAL',3)->nullable();
            $table->integer('HONOURS_PASS_FEMALE',3)->nullable();
            $table->integer('HONOURS_SOMMAN_TOTAL',3)->nullable();
            $table->integer('HONOURS_SOMMAN_FEMALE',3)->nullable();
            $table->integer('MASTERS_TOTAL',3)->nullable();
            $table->integer('MASTERS_FEMALE',3)->nullable();
            $table->integer('DAKHIL_TOTAL',3)->nullable();
            $table->integer('DAKHIL_FEMALE',3)->nullable();
            $table->integer('ALIM_TOTAL',3)->nullable();
            $table->integer('ALIM_FEMALE',3)->nullable();
            $table->integer('FAZIL_TOTAL',3)->nullable();
            $table->integer('FAZIL_FEMALE',3)->nullable();
            $table->integer('KAMIL_TOTAL',3)->nullable();
            $table->integer('KAMIL_FEMALE',3)->nullable();
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
        Schema::dropIfExists('student_summary_repeaters');
    }
}
