<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstCurriculumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_curriculums', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('EL_DIP_TECH_EDUCATION',1);
            $table->string('EL_DIP_VOC_EDUCATION',1);
            $table->string('EL_DIP_ENGINEERING',1);
            $table->string('EL_DIP_TEXTILE',1);
            $table->string('EL_DIP_AGRICULTURE',1);
            $table->string('EL_DIP_FISHERIES',1);
            $table->string('EL_DIP_FISHERIES_SERVICE',1);
            $table->string('EL_DIP_FORESTRY',1);
            $table->string('EL_DIP_FORESTRY_SERVICE',1);
            $table->string('EL_DIP_LIVESTOCK',1);
            $table->string('EL_DIP_MEDICAL_TECH',1);
            $table->string('EL_DIP_NAVAL',1);
            $table->string('EL_DIP_ARMY',1);
            $table->string('EL_DIP_TOURISM',1);
            $table->string('EL_DIP_ULTRASOUND',1);
            $table->string('EL_DIP_ANIMAL_SERVICE',1);
            $table->string('EL_HSC_BM',1);
            $table->string('EL_HSC_VOC',1);
            $table->string('EL_DIP_COMMERCE',1);
            $table->string('EL_SSC_VOC',1);
            $table->string('EL_DAKHIL_VOC',1);
            $table->string('EL_CERTIFICATE_MARINE',1);
            $table->string('EL_SKILL_CERTIFICATE',1);
            $table->string('EL_CERTIFICATE_VOC',1);
            $table->string('EL_CERTIFICATE_HEALTH',1);
            $table->string('EL_CERTIFICATE_POULTRY',1);
            $table->string('EL_CERTIFICATE_ANIMAL_HEALTH',1);
            $table->string('EL_CERTIFICATE_ULTRASOUND',1);
            $table->string('EL_NATIONAL_SKILLS2',1);
            $table->string('EL_NATIONAL_SKILLS3',1);
            $table->string('EL_PROF_DIP_AUTOMOBILE',1);
            $table->string('EL_NATIONAL_SKILLS360',1);
            $table->string('EL_ADVANCED_CERTIFICATE',1);
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
        Schema::dropIfExists('inst_curriculums');
    }
}
