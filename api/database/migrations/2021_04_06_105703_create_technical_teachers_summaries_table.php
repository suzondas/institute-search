<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalTeachersSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_teachers_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('DESIGNATION_ID',3)->unsigned();
            $table->integer('TEACHERS_IN_SERVICE',3)->nullable();
            $table->integer('FEMALE_TEACHERS_IN_SERVICE',3)->nullable();
            $table->integer('MPO_TEACHERS',3)->nullable();
            $table->integer('FEMALE_MPO_TEACHERS',3)->nullable();
            $table->integer('BLANK_POST_NO',3)->nullable();
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
        Schema::dropIfExists('technical_teachers_summaries');
    }
}
