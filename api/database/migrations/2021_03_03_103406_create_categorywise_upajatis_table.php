<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorywiseUpajatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorywise_upajatis', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('upajati_id')->unsigned();
            $table->foreign('upajati_id')->references('id')->on('LOOKUP_UPAJATIS');
            $table->integer('TOTAL_TEACHER',4)->nullable();
            $table->integer('FEMALE_TEACHER',4)->nullable();
            $table->integer('SIX_TOTAL',4)->nullable();
            $table->integer('SIX_GIRLS',4)->nullable();
            $table->integer('SEVEN_TOTAL',4)->nullable();
            $table->integer('SEVEN_GIRLS',4)->nullable();
            $table->integer('EIGHT_TOTAL',4)->nullable();
            $table->integer('EIGHT_GIRLS',4)->nullable();
            $table->integer('NINE_TOTAL',4)->nullable();
            $table->integer('NINE_GIRLS',4)->nullable();
            $table->integer('TEN_TOTAL',4)->nullable();
            $table->integer('TEN_GIRLS',4)->nullable();
            $table->integer('ELEVEN_TOTAL',4)->nullable();
            $table->integer('ELEVEN_FEMALE',4)->nullable();
            $table->integer('TWELVE_TOTAL',4)->nullable();
            $table->integer('TWELVE_FEMALE',4)->nullable();
            $table->integer('DEGREE1ST_TOTAL',4)->nullable();
            $table->integer('DEGREE1ST_GIRLS',4)->nullable();
            $table->integer('DEGREE2ND_TOTAL',4)->nullable();
            $table->integer('DEGREE2ND_GIRLS',4)->nullable();
            $table->integer('DEGREE3RD_TOTAL',4)->nullable();
            $table->integer('DEGREE3RD_GIRLS',4)->nullable();
            $table->integer('HONORS_TOTAL',4)->nullable();
            $table->integer('HONORS_GIRLS',4)->nullable();
            $table->integer('MASTERS_TOTAL',4)->nullable();
            $table->integer('MASTERS_GIRLS',4)->nullable();
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
        Schema::dropIfExists('categorywise_upajatis');
    }
}
