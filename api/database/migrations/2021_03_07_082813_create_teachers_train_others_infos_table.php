<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTrainOthersInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_train_others_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('CREATIVE_3DAY_TOTAL',4)->nullable();
            $table->integer('CREATIVE_3DAY_FEMALE',4)->nullable();
            $table->integer('CREATIVE_12DAY_TOTAL',4)->nullable();
            $table->integer('CREATIVE_12DAY_FEMALE',4)->nullable();
            $table->integer('ONJOB_TRAINING_TOTAL',4)->nullable();
            $table->integer('ONJOB_TRAINING_FEMALE',4)->nullable();
            $table->integer('ONJOB_TRAINING_TRIBE_TOTAL',4)->nullable();
            $table->integer('ONJOB_TRAINING_TRIBE_FEMALE',4)->nullable();
            $table->string('AUTISM_GUIDE_TEACHER_YN',1)->nullable();
            $table->string('DISASTER_TRAIN_TEACHER_YN',1)->nullable();
            $table->integer('DISASTER_TRAIN_TEACHER',4)->nullable();
            $table->string('TRAINING_REQUIRED1',100)->nullable();
            $table->string('TRAINING_REQUIRED2',100)->nullable();
            $table->string('TRAINING_REQUIRED3',100)->nullable();
            $table->string('TRAINING_REQUIRED4',100)->nullable();
            $table->integer('TOTAL_ENG_TEACHERS',2)->nullable();
            $table->integer('FEMALE_ENG_TEACHER',2)->nullable();
            $table->integer('HONS_100_ENG',2)->nullable();
            $table->integer('HONS_300_ENG',2)->nullable();
            $table->integer('ENG_HONS',2)->nullable();
            $table->integer('ENG_HONS_MST',2)->nullable();
            $table->integer('HONS_WITHOUT_ENG',2)->nullable();
            $table->integer('ENG_HSC_PASS',2)->nullable();
            $table->integer('TOTAL_MATH_TEACHERS',2)->nullable();
            $table->integer('FEMALE_MATH_TEACHER',2)->nullable();
            $table->integer('HONS_PCM',2)->nullable();
            $table->integer('HONS_OTHER_MATH',2)->nullable();
            $table->integer('MATH_HONS',2)->nullable();
            $table->integer('MATH_HONS_MST',2)->nullable();
            $table->integer('DEG_HSC_WITH_MATH',2)->nullable();
            $table->integer('HONS_WITHOUT_MATH',2)->nullable();
            $table->integer('MATH_HSC_PASS',2)->nullable();
            $table->integer('HSC_WITHOUT_MATH',2)->nullable();
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
        Schema::dropIfExists('teachers_train_others_infos');
    }
}
