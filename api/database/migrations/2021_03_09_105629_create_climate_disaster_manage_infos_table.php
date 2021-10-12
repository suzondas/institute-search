<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClimateDisasterManageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climate_disaster_manage_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('DISASTER_AREA_TYPE')->unsigned();
            $table->foreign('DISASTER_AREA_TYPE')->references('DISASTER_TYPE')->on('LOOKUP_DISASTER');
            $table->string('SHILTER_HOUSE_YN',1)->nullable();
            $table->string('RECORD_KEEPING_MANUAL',1)->nullable();
            $table->string('RECORD_KEEPING_DIGITAL',1)->nullable();
            $table->string('RECORD_KEEPING_BOTH',1)->nullable();
            $table->string('DISASTER_AREA_YN',1)->nullable();
            $table->integer('HOSTAL_DAMAGE_LAST',2)->nullable();
            $table->integer('HOSTAL_DAMAGE_AMFAN',2)->nullable();
            $table->integer('HOSTAL_DAMAGE_FLOOD',2)->nullable();
            $table->integer('CLASSROOM_DAMAGE_LAST',2)->nullable();
            $table->integer('CLASSROOM_DAMAGE_AMFAN',2)->nullable();
            $table->integer('CLASSROOM_DAMAGE_FLOOD',2)->nullable();
            $table->integer('TREE_DAMAGE_LAST',2)->nullable();
            $table->integer('TREE_DAMAGE_AMFAN',2)->nullable();
            $table->integer('TREE_DAMAGE_FLOOD',2)->nullable();
            $table->integer('INST_CLOSE_DAMAGE_LAST',2)->nullable();
            $table->integer('INST_CLOSE_AMFAN',2)->nullable();
            $table->integer('INST_CLOSE_FLOOD',2)->nullable();
            $table->integer('CLASS_CLOSE_DAMAGE_LAST',2)->nullable();
            $table->integer('CLASS_CLOSE_AMFAN',2)->nullable();
            $table->integer('CLASS_CLOSE_FLOOD',2)->nullable();
            $table->integer('INST_REPLACE_DAMAGE_LAST',2)->nullable();
            $table->integer('INST_REPLACE_AMFAN',2)->nullable();
            $table->integer('INST_REPLACE_FLOOD',2)->nullable();
            $table->integer('ROAD_PARTIAL_DAMAGE_LAST',2)->nullable();
            $table->integer('ROAD_PARTIAL_AMFAN',2)->nullable();
            $table->integer('ROAD_PARTIAL_FLOOD',2)->nullable();
            $table->integer('ROAD_FULL_DAMAGE_LAST',2)->nullable();
            $table->integer('ROAD_FULL_AMFAN',2)->nullable();
            $table->integer('ROAD_FULL_FLOOD',2)->nullable();
            $table->integer('TEACH_PROBLEM_DAMAGE_LAST',2)->nullable();
            $table->integer('TEACH_PROBLEM_AMFAN',2)->nullable();
            $table->integer('TEACH_PROBLEM_FLOOD',2)->nullable();
            $table->integer('TEACH_VOLANTIER_DAMAGE_LAST',2)->nullable();
            $table->integer('TEACH_VOLANTIER_AMFAN',2)->nullable();
            $table->integer('TEACH_VOLANTIER_FLOOD',2)->nullable();
            $table->integer('WATER_SUP_FAIL_DAMAGE_LAST',2)->nullable();
            $table->integer('WATER_SUP_FAIL_AMFAN',2)->nullable();
            $table->integer('WATER_SUP_FAIL_FLOOD',2)->nullable();
            $table->integer('SANIT_FAIL_DAMAGE_LAST',2)->nullable();
            $table->integer('SANIT_FAIL_AMFAN',2)->nullable();
            $table->integer('SANIT_FAIL_FLOOD',2)->nullable();
            $table->integer('INST_SHELTER_LAST',2)->nullable();
            $table->integer('INST_SHELTER_AMFAN',2)->nullable();
            $table->integer('INST_SHELTER_FLOOD',2)->nullable();
            $table->integer('PLAYGROUND_DAMAGE_LAST',2)->nullable();
            $table->integer('PLAYGROUND_DAMAGE_AMFAN',2)->nullable();
            $table->integer('PLAYGROUND_DAMAGE_FLOOD',2)->nullable();
            $table->integer('SYLLABUS_DAMAGE_LAST',2)->nullable();
            $table->integer('PSYLLABUS_AMFAN',2)->nullable();
            $table->integer('SYLLABUS_FLOOD',2)->nullable();
            $table->string('NATURAL_DISASTER_NAME1',100)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_MALE1',3)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_FEMALE1',3)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_TOTAL1',3)->nullable();
            $table->string('NATURAL_DISASTER_NAME2',100)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_MALE2',3)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_FEMALE2',3)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_TOTAL2',3)->nullable();
            $table->string('NATURAL_DISASTER_NAME3',100)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_MALE3',3)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_FEMALE3',3)->nullable();
            $table->integer('NATURAL_DIS_DROPOUT_TOTAL3',3)->nullable();
            $table->string('HUMAN_DISASTER_NAME1',100)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_MALE1',3)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_FEMALE1',3)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_TOTAL1',3)->nullable();
            $table->string('HUMAN_DISASTER_NAME2',100)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_MALE2',3)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_FEMALE2',3)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_TOTAL2',3)->nullable();
            $table->string('HUMAN_DISASTER_NAME3',100)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_MALE3',3)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_FEMALE3',3)->nullable();
            $table->integer('HUMAN_DIS_DROPOUT_TOTAL3',3)->nullable();
            $table->string('BUILDING_DAMAGE_YN',1)->nullable();
            $table->string('FURNITURE_DAMAGE_YN',1)->nullable();
            $table->string('ROOF_DAMAGE_YN',1)->nullable();
            $table->string('DOOR_DAMAGE_YN',1)->nullable();
            $table->string('WATER_SUPPLY_DAMAGE_YN',1)->nullable();
            $table->string('SANITATION_DAMAGE_YN',1)->nullable();
            $table->string('CONNECTING_ROAD_DAMAGEYN',1)->nullable();
            $table->string('OTHERS_DAMAGE_DETAILS',200)->nullable();
            $table->string('DAMAGE_SUBJECT_BANGLA',1)->nullable();
            $table->string('MANAGEABLE_BANGLA',1)->nullable();
            $table->string('PROBLEM_BANGLA',1)->nullable();
            $table->string('PERMANENT_DAMAGE_BANGLA',1)->nullable();
            $table->string('DAMAGE_SUBJECT_ENGLISH',1)->nullable();
            $table->string('MANAGEABLE_ENGLISH',1)->nullable();
            $table->string('PROBLEM_ENGLISH',1)->nullable();
            $table->string('PERMANENT_DAMAGE_ENGLISH',1)->nullable();
            $table->string('DAMAGE_SUBJECT_MATH',1)->nullable();
            $table->string('MANAGEABLE_MATH',1)->nullable();
            $table->string('PROBLEM_MATH',1)->nullable();
            $table->string('PERMANENT_DAMAGE_MATH',1)->nullable();
            $table->string('DAMAGE_SUBJECT_SOCIAL',1)->nullable();
            $table->string('MANAGEABLE_SOCIAL',1)->nullable();
            $table->string('PROBLEM_SOCIAL',1)->nullable();
            $table->string('PERMANENT_DAMAGE_SOCIAL',1)->nullable();
            $table->string('DAMAGE_SUBJECT_SCIENCE',1)->nullable();
            $table->string('MANAGEABLE_SCIENCE',1)->nullable();
            $table->string('PROBLEM_SCIENCE',1)->nullable();
            $table->string('DAMAGE_SUBJECT_RELIGION',1)->nullable();
            $table->string('MANAGEABLE_RELIGION',1)->nullable();
            $table->string('PROBLEM_RELIGION',1)->nullable();
            $table->string('DAMAGE_SUBJECT_ACCOUNTS',1)->nullable();
            $table->string('MANAGEABLE_ACCOUNTS',1)->nullable();
            $table->string('PROBLEM_ACCOUNTS',1)->nullable();
            $table->string('DAMAGE_SUBJECT_OTHER',1)->nullable();
            $table->string('MANAGEABLE_OTHER',1)->nullable();
            $table->string('PROBLEM_OTHER',1)->nullable();
            $table->string('DISASTER_RECOVER_STEP',100)->nullable();
            $table->string('DISASTER_REPORTING',100)->nullable();
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
        Schema::dropIfExists('climate_disaster_manage_infos');
    }
}
