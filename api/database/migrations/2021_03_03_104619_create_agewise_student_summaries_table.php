<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgewiseStudentSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agewise_student_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('CLASS_ID',4)->unsigned();
            $table->foreign('CLASS_ID')->references('CLASS_ID')->on('classes');
            $table->integer('FIVE_TOTAL',5)->nullable();
            $table->integer('FIVE_FEMALE',5)->nullable();
            $table->integer('SIX_TOTAL',5)->nullable();
            $table->integer('SIX_FEMALE',5)->nullable();
            $table->integer('SEVEN_TOTAL',5)->nullable();
            $table->integer('SEVEN_FEMALE',5)->nullable();
            $table->integer('EIGHT_TOTAL',5)->nullable();
            $table->integer('EIGHT_FEMALE',5)->nullable();
            $table->integer('NINE_TOTAL',5)->nullable();
            $table->integer('NINE_FEMALE',5)->nullable();
            $table->integer('UPPER_NINE_TOTAL',5)->nullable();
            $table->integer('UPPER_NINE_FEMALE',5)->nullable();
            $table->integer('TEN_TOTAL',5)->nullable();
            $table->integer('TEN_FEMALE',5)->nullable();
            $table->integer('ELEVEN_TOTAL',5)->nullable();
            $table->integer('ELEVEN_FEMALE',5)->nullable();
            $table->integer('TWELVE_TOTAL',5)->nullable();
            $table->integer('TWELVE_FEMALE',5)->nullable();
            $table->integer('THIRTEEN_TOTAL',5)->nullable();
            $table->integer('THIRTEEN_FEMALE',5)->nullable();
            $table->integer('FOURTEEN_TOTAL',5)->nullable();
            $table->integer('FOURTEEN_FEMALE',5)->nullable();
            $table->integer('FIFTEEN_TOTAL',5)->nullable();
            $table->integer('FIFTEEN_FEMALE',5)->nullable();
            $table->integer('UNDER_FIFTEEN_TOTAL',5)->nullable();
            $table->integer('UNDER_FIFTEEN_FEMALE',5)->nullable();
            $table->integer('SIXTEEN_TOTAL',5)->nullable();
            $table->integer('SIXTEEN_FEMALE',5)->nullable();
            $table->integer('SEVENTEEN_TOTAL',5)->nullable();
            $table->integer('SEVENTEEN_FEMALE',5)->nullable();
            $table->integer('UP_SEVENTEEN_TOTAL',5)->nullable();
            $table->integer('UP_SEVENTEEN_FEMALE',5)->nullable();
            $table->integer('EIGHTEEN_TOTAL',5)->nullable();
            $table->integer('EIGHTEEN_FEMALE',5)->nullable();
            $table->integer('NINETEEN_TOTAL',5)->nullable();
            $table->integer('NINETEEN_FEMALE',5)->nullable();
            $table->integer('TWENTY_TOTAL',5)->nullable();
            $table->integer('TWENTY_FEMALE',5)->nullable();
            $table->integer('TWENTYONE_TOTAL',5)->nullable();
            $table->integer('TWENTYONE_FEMALE',5)->nullable();
            $table->integer('UPPER_TWENTYONE_TOTAL',5)->nullable();
            $table->integer('UPPER_TWENTYONE_FEMALE',5)->nullable();
            $table->integer('TWENTYTWO_TOTAL',5)->nullable();
            $table->integer('TWENTYTWO_FEMALE',5)->nullable();
            $table->integer('TWENTYTHREE_TOTAL',5)->nullable();
            $table->integer('TWENTYTHREE_FEMALE',5)->nullable();
            $table->integer('TWENTYFOUR_TOTAL',5)->nullable();
            $table->integer('TWENTYFOUR_FEMALE',5)->nullable();
            $table->integer('TWENTYFIVE_TOTAL',5)->nullable();
            $table->integer('TWENTYFIVE_FEMALE',5)->nullable();
            $table->integer('TOTAL_STUDENT',5)->nullable();
            $table->integer('FEMALE_STUDENT',5)->nullable();
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
        Schema::dropIfExists('agewise_student_summaries');
    }
}
