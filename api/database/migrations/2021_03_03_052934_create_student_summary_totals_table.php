<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSummaryTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_summary_totals', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('ONE_FIVE_TOTAL',5)->nullable();
            $table->integer('ONE_FIVE_GIRL',5)->nullable();
            $table->integer('SIX_TEN_TOTAL',5)->nullable();
            $table->integer('SIX_TEN_GIRL',5)->nullable();
            $table->integer('ELEVEN_TWELVE_TOTAL',5)->nullable();
            $table->integer('ELEVEN_TWELVE_GIRL',5)->nullable();
            $table->integer('BACHELOR_PASS_TOTAL',5)->nullable();
            $table->integer('BACHELOR_PASS_GIRL',5)->nullable();
            $table->integer('BACHELOR_HONORS_TOTAL',5)->nullable();
            $table->integer('BACHELOR_HONORS_GIRL',5)->nullable();
            $table->integer('MASTERS_TOTAL',5)->nullable();
            $table->integer('MASTERS_GIRL',5)->nullable();
            $table->integer('FAZIL_PASS_TOTAL',5)->nullable();
            $table->integer('FAZIL_PASS_GIRL',5)->nullable();
            $table->integer('FAZIL_HONORS_TOTAL',5)->nullable();
            $table->integer('FAZIL_HONORS_GIRL',5)->nullable();
            $table->integer('KAMIL_TOTAL',5)->nullable();
            $table->integer('KAMIL_GIRL',5)->nullable();
            $table->integer('VOC_TOTAL',5)->nullable();
            $table->integer('VOC_GIRL',5)->nullable();
            $table->integer('BM_TOTAL',5)->nullable();
            $table->integer('BM_GIRL',5)->nullable();
            $table->integer('TEC_SSC_TOTAL',5)->nullable();
            $table->integer('TEC_SSC_GIRL',5)->nullable();
            $table->integer('TEC_HSC_TOTAL',5)->nullable();
            $table->integer('TEC_HSC_GIRL',5)->nullable();
            $table->integer('DIP_TOTAL',5)->nullable();
            $table->integer('DIP_GIRL',5)->nullable();
            $table->integer('CERTF_TOTAL',5)->nullable();
            $table->integer('CERTF_GIRL',5)->nullable();
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
        Schema::dropIfExists('student_summary_totals');
    }
}
