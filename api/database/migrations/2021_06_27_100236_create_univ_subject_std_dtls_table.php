<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivSubjectStdDtlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_subject_std_dtls', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('DEPT_ID',10)->nullable();
            $table->integer('SUBJECT_ID',10)->nullable();
            $table->string('DEGREE_NAME',250)->nullable();
            $table->string('SUBJECT_NAME',250)->nullable();
            $table->integer('SUBJECT_TYPE',10)->nullable();
            $table->integer('TOTAL_STD_1ST',10)->nullable();
            $table->integer('FEMALE_STD_1ST',10)->nullable();
            $table->integer('TOTAL_STD_2ND',10)->nullable();
            $table->integer('FEMALE_STD_2ND',10)->nullable();
            $table->integer('TOTAL_STD_3RD',10)->nullable();
            $table->integer('FEMALE_STD_3RD',10)->nullable();
            $table->integer('TOTAL_STD_4TH',10)->nullable();
            $table->integer('FEMALE_STD_4TH',10)->nullable();
            $table->integer('TOTAL_STD_5TH',10)->nullable();
            $table->integer('FEMALE_STD_5TH',10)->nullable();
            $table->integer('TOTAL_STD_6TH',10)->nullable();
            $table->integer('FEMALE_STD_6TH',10)->nullable();
            $table->integer('TOTAL_STD_7TH',10)->nullable();
            $table->integer('FEMALE_STD_7TH',10)->nullable();
            $table->integer('TOTAL_STD_8TH',10)->nullable();
            $table->integer('FEMALE_STD_8TH',10)->nullable();
            $table->integer('TOTAL_STD_9TH',10)->nullable();
            $table->integer('FEMALE_STD_9TH',10)->nullable();
            $table->integer('TOTAL_STD_10TH',10)->nullable();
            $table->integer('FEMALE_STD_10TH',10)->nullable();
            $table->integer('TOTAL_STD_11TH',10)->nullable();
            $table->integer('FEMALE_STD_11TH',10)->nullable();
            $table->integer('TOTAL_STD_12TH',10)->nullable();
            $table->integer('FEMALE_STD_12TH',10)->nullable();
            $table->integer('TOTAL_STD',10)->nullable();
            $table->integer('FEMALE_STD',10)->nullable();
            $table->integer('SECTION_TOTAL',10)->nullable();
            $table->integer('TOTAL_PASSED',10)->nullable();
            $table->integer('FEMALE_PASSED',10)->nullable();
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
        Schema::dropIfExists('univ_subject_std_dtls');
    }
}
