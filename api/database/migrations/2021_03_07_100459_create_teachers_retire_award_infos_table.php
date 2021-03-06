<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersRetireAwardInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_retire_award_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('COUNT_DAY_TOTAL',3)->nullable();
            $table->integer('COUNT_DAY_FEMALE',3)->nullable();
            $table->integer('RETIRED_TEACHER_TOTAL',3)->nullable();
            $table->integer('RERIRED_TEACHER_FEMALE',3)->nullable();
            $table->integer('RETIREDFU_TEACHER_TOTAL',3)->nullable();
            $table->integer('RERIREDFU_TEACHER_FEMALE',3)->nullable();
            $table->integer('NEW_RECRUITE_TEACHER_TOTAL',3)->nullable();
            $table->integer('NEW_RECRUITE_TEACHER_FEMALE',3)->nullable();
            $table->integer('LEAVE_TEACHER_TOTAL',3)->nullable();
            $table->integer('LEAVE_TEACHER_FEMALE',3)->nullable();
            $table->integer('NTRC_TEACHER_TOTAL',3)->nullable();
            $table->integer('NTRC_TEACHER_FEMALE',3)->nullable();
            $table->integer('RESEARCH_TEACHER_TOTAL',3)->nullable();
            $table->integer('RESEARCH_TEACHER_FEMALE',3)->nullable();
            $table->integer('AWARDED_TEACHER_TOTAL',3)->nullable();
            $table->integer('AWARDED_TEACHER_FEMALE',3)->nullable();
            $table->integer('LEARNING_TRAINED_TOTAL',3)->nullable();
            $table->integer('LEARNING_TRAINED_FEMALE',3)->nullable();
            $table->integer('SPECIAL_TRAINED_TOTAL',3)->nullable();
            $table->integer('SPECIAL_TRAINED_FEMALE',3)->nullable();
            $table->integer('INCLUSIVE_TOTAL',3)->nullable();
            $table->integer('INCLUSIVE_FEMALE',3)->nullable();
            $table->integer('ICT_TRAINED_TOTAL',3)->nullable();
            $table->integer('ICT_TRAINED_FEMALE',3)->nullable();
            $table->integer('INSERVICE_TRAINED_TOTAL',3)->nullable();
            $table->integer('INSERVICE_TRAINED_FEMALE',3)->nullable();
            $table->integer('CREATIVE_TRAINED_TOTAL',3)->nullable();
            $table->integer('CREATIVE_TRAINED_FEMALE',3)->nullable();
            $table->string('BEST_INST_NATIONAL',1)->nullable();
            $table->string('BEST_INST_DIVISION',1)->nullable();
            $table->string('BEST_INST_DISTRICT',1)->nullable();
            $table->string('BEST_INST_THANA',1)->nullable();
            $table->string('BEST_INST_YEAR',4)->nullable();
            $table->string('BEST_INST_HEAD_NATIONAL',1)->nullable();
            $table->string('BEST_INST_HEAD_DIVISION',1)->nullable();
            $table->string('BEST_INST_HEAD_DISTRICT',1)->nullable();
            $table->string('BEST_INST_HEAD_THANA',1)->nullable();
            $table->string('BEST_INST_HEAD_YEAR',4)->nullable();
            $table->string('BEST_CLASS_TEA_NATIONAL',1)->nullable();
            $table->string('BEST_CLASS_TEA_DIVISION',1)->nullable();
            $table->string('BEST_CLASS_TEA_DISTRICT',1)->nullable();
            $table->string('BEST_CLASS_TEA_THANA',1)->nullable();
            $table->string('BEST_CLASS_TEA_YEAR',4)->nullable();
            $table->string('BEST_TEA_BNCC_NATIONAL',1)->nullable();
            $table->string('BEST_TEA_BNCC_DIVISION',1)->nullable();
            $table->string('BEST_TEA_BNCC_DISTRICT',1)->nullable();
            $table->string('BEST_TEA_BNCC_THANA',1)->nullable();
            $table->string('BEST_TEA_BNCC_YEAR',4)->nullable();
            $table->string('BEST_TEA_SCOUT_NATIONAL',1)->nullable();
            $table->string('BEST_TEA_SCOUT_DIVISION',1)->nullable();
            $table->string('BEST_TEA_SCOUT_DISTRICT',1)->nullable();
            $table->string('BEST_TEA_SCOUT_THANA',1)->nullable();
            $table->string('BEST_TEA_SCOUT_YEAR',4)->nullable();
            $table->string('BEST_TEA_GGUIDE_NATIONAL',1)->nullable();
            $table->string('BEST_TEA_GGUIDE_DIVISION',1)->nullable();
            $table->string('BEST_TEA_GGUIDE_DISTRICT',1)->nullable();
            $table->string('BEST_TEA_GGUIDE_THANA',1)->nullable();
            $table->string('BEST_TEA_GGUIDE_YEAR',4)->nullable();
            $table->string('BEST_STD_NATIONAL',1)->nullable();
            $table->string('BEST_STD_DIVISION',1)->nullable();
            $table->string('BEST_STD_DISTRICT',1)->nullable();
            $table->string('BEST_STD_THANA',1)->nullable();
            $table->string('BEST_STD_YEAR',4)->nullable();
            $table->string('BEST_STD_BNCC_NATIONAL',1)->nullable();
            $table->string('BEST_STD_BNCC_DIVISION',1)->nullable();
            $table->string('BEST_STD_BNCC_DISTRICT',1)->nullable();
            $table->string('BEST_STD_BNCC_THANA',1)->nullable();
            $table->string('BEST_STD_BNCC_YEAR',4)->nullable();
            $table->string('BEST_STD_SCOUT_NATIONAL',1)->nullable();
            $table->string('BEST_STD_SCOUT_DIVISION',1)->nullable();
            $table->string('BEST_STD_SCOUT_DISTRICT',1)->nullable();
            $table->string('BEST_STD_SCOUT_THANA',1)->nullable();
            $table->string('BEST_STD_SCOUT_YEAR',4)->nullable();
            $table->string('BEST_STD_GGUIDE_NATIONAL',1)->nullable();
            $table->string('BEST_STD_GGUIDE_DIVISION',1)->nullable();
            $table->string('BEST_STD_GGUIDE_DISTRICT',1)->nullable();
            $table->string('BEST_STD_GGUIDE_THANA',1)->nullable();
            $table->string('BEST_STD_GGUIDE_YEAR',4)->nullable();
            $table->string('INSTITUTE_CULTUREAL_PARTI',2)->nullable();
            $table->string('UPAZILA_CULTUREAL_PARTI',2)->nullable();
            $table->string('DISTRICT_CULTUREAL_PARTI',2)->nullable();
            $table->string('DIVISION_CULTUREAL_PARTI',2)->nullable();
            $table->string('NATIONAL_CULTUREAL_PARTI',2)->nullable();
            $table->string('INSTITUTE_CULTUREAL_AWARD',2)->nullable();
            $table->string('UPAZILA_CULTUREAL_AWARD',2)->nullable();
            $table->string('DISTRICT_CULTUREAL_AWARD',2)->nullable();
            $table->string('DIVISION_CULTUREAL_AWARD',2)->nullable();
            $table->string('NATIONAL_CULTUREAL_AWARD',2)->nullable();
            $table->string('INSTITUTE_SPORTS_PARTI',2)->nullable();
            $table->string('UPAZILA_SPORTS_PARTI',2)->nullable();
            $table->string('DISTRICT_SPORTS_PARTI',2)->nullable();
            $table->string('DIVISION_SPORTS_PARTI',2)->nullable();
            $table->string('NATIONAL_SPORTS_PARTI',2)->nullable();
            $table->string('INSTITUTE_SPORTS_AWARD',2)->nullable();
            $table->string('UPAZILA_SPORTS_AWARD',2)->nullable();
            $table->string('DISTRICT_SPORTS_AWARD',2)->nullable();
            $table->string('DIVISION_SPORTS_AWARD',2)->nullable();
            $table->string('NATIONAL_SPORTS_AWARD',2)->nullable();
            $table->string('INSTITUTE_INDOOR_PARTI',2)->nullable();
            $table->string('UPAZILA_INDOOR_PARTI',2)->nullable();
            $table->string('DISTRICT_INDOOR_PARTI',2)->nullable();
            $table->string('DIVISION_INDOOR_PARTI',2)->nullable();
            $table->string('NATIONAL_INDOOR_PARTI',2)->nullable();
            $table->string('INSTITUTE_INDOOR_AWARD',2)->nullable();
            $table->string('UPAZILA_INDOOR_AWARD',2)->nullable();
            $table->string('DISTRICT_INDOOR_AWARD',2)->nullable();
            $table->string('DIVISION_INDOOR_AWARD',2)->nullable();
            $table->string('NATIONAL_INDOOR_AWARD',2)->nullable();
            $table->string('INSTITUTE_CREATIVE_PARTI',2)->nullable();
            $table->string('UPAZILA_CREATIVE_PARTI',2)->nullable();
            $table->string('DISTRICT_CREATIVE_PARTI',2)->nullable();
            $table->string('DIVISION_CREATIVE_PARTI',2)->nullable();
            $table->string('NATIONAL_CREATIVE_PARTI',2)->nullable();
            $table->string('INSTITUTE_CREATIVE_AWARD',2)->nullable();
            $table->string('UPAZILA_CREATIVE_AWARD',2)->nullable();
            $table->string('DISTRICT_CREATIVE_AWARD',2)->nullable();
            $table->string('DIVISION_CREATIVE_AWARD',2)->nullable();
            $table->string('NATIONAL_CREATIVE_AWARD',2)->nullable();
            $table->string('INSTITUTE_SPECIAL_AWARD',2)->nullable();
            $table->string('UPAZILA_SPECIAL_AWARD',2)->nullable();
            $table->string('DISTRICT_SPECIAL_AWARD',2)->nullable();
            $table->string('DIVISION_SPECIAL_AWARD',2)->nullable();
            $table->string('NATIONAL_SPECIAL_AWARD',2)->nullable();
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
        Schema::dropIfExists('teachers_retire_award_infos');
    }
}
