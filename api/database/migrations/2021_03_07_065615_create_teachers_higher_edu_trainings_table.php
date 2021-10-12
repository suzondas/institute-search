<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersHigherEduTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_higher_edu_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('HIGHER_DEGREE_ID',2)->unsigned();
            $table->foreign('HIGHER_DEGREE_ID')->references('HIGHER_DEGREE_ID')->on('LOOKUP_HIGHER_DEGREES_TRAINING');
            $table->integer('TOTAL_TEACHER',4)->nullable();
            $table->integer('FEMALE_TEACHER',4)->nullable();
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
        Schema::dropIfExists('teachers_higher_edu_trainings');
    }
}
