<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_uses', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('OFFICE_ROOM',3)->nullable();
            $table->integer('INST_HEAD_ROOM',3)->nullable();
            $table->integer('TEACHERS_ROOM',3)->nullable();
            $table->integer('CLASS_ROOM',3)->nullable();
            $table->integer('LABORATORY',2)->nullable();
            $table->integer('LIBRARY',2)->nullable();
            $table->integer('MALE_COMMON_ROOM',1)->nullable();
            $table->integer('FEMALE_COMMON_ROOM',1)->nullable();
            $table->integer('SICK_ROOM',3)->nullable();
            $table->integer('HOSTEL',3)->nullable();
            $table->integer('HOSTAL_SIT',3)->nullable();
            $table->integer('RESIDENT_BOY_TOTAL',3)->nullable();
            $table->integer('GIRLS_HOSTAL',3)->nullable();
            $table->integer('GIRLS_HOSTAL_SIT',3)->nullable();
            $table->integer('RESIDENT_GIRL_TOTAL',3)->nullable();
            $table->integer('TEACHERS_RESIDENCE',2)->nullable();
            $table->integer('TEACHERS_RESIDENCE_SIT',3)->nullable();
            $table->integer('RESIDENT_TEACHER_TOTAL',3)->nullable();
            $table->integer('AUTISTIC_REST_ROOM',2)->nullable();
            $table->integer('COUNSELING_ROOM',2)->nullable();
            $table->integer('EDU_INSTRUMENT_ROOM',2)->nullable();
            $table->integer('OTHERS',2)->nullable();
            $table->string('MOSJID',1)->nullable();
            $table->string('PRAYER_ROOM',1)->nullable();
            $table->string('MONDIR',1)->nullable();
            $table->string('GIRJA',1)->nullable();
            $table->string('pagoda',1)->nullable();
            $table->string('OTHER_RELIGIOUS_PLACE',1)->nullable();
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
        Schema::dropIfExists('building_uses');
    }
}
