<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesFacilitiesOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes_facilities_others', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('SHAID_MENAR_YN',1)->nullable();
            $table->string('PERMANENT_ALTAR_YN',1)->nullable();
            $table->string('SOTOTA_STORE_YN',1)->nullable();
            $table->string('GAS_CONNECTION_YN',1)->nullable();
            $table->string('HAND_SANITIZER_YN',1)->nullable();
            $table->string('SOAP_YN',1)->nullable();
            $table->string('BOUNDARYWALL_YN',1)->nullable();
            $table->string('BOUNDARY_STATUS',1)->nullable();
            $table->string('BOUNDARY_TYPE',1)->nullable();
            $table->integer('BOUNDARY_YEAR',4)->nullable();
            $table->string('PURE_DRINKING_WATER',1)->nullable();
            $table->string('KUP',1)->nullable();
            $table->string('TUBEWL',1)->nullable();
            $table->string('DEEP_TUBEWEL',1)->nullable();
            $table->string('SUPPLY_WATER',1)->nullable();
            $table->string('JHORNA',1)->nullable();
            $table->string('BOTTLE_WATER',1)->nullable();
            $table->string('RAIN_WATER',1)->nullable();
            $table->string('ARSENIC_TEST',1)->nullable();
            $table->string('ARSENIC_RESULT',1)->nullable();
            $table->string('MANGANESE_TEST',1)->nullable();
            $table->string('MANGANESE_RESULT',1)->nullable();
            $table->string('WATER_PURIFIER_MACHINE',1)->nullable();
            $table->string('TOILET_FACILITIES_YN',1)->nullable();
            $table->integer('SLUB_TOILET',2)->nullable();
            $table->integer('TOILET_WITH_FLASH',2)->nullable();
            $table->integer('TOILET_WITHOUT_FLASH',2)->nullable();
            $table->integer('KACHA_TOILET',2)->nullable();
            $table->integer('USABLE_TOILET',2)->nullable();
            $table->integer('UNUSABLE_TOILET',3)->nullable();
            $table->integer('TOT_US_TOILET',3)->nullable();
            $table->string('ATTACHED_TOILET_INST_HEAD',1)->nullable();
            $table->string('FEMALE_SEPERATE_TOILET',1)->nullable();
            $table->integer('FEMALE_TOILET_NEW',2)->nullable();
            $table->integer('FEMALE_TOILET_OLD',2)->nullable();
            $table->integer('FEMALE_TOILET_TOTAL',2)->nullable();
            $table->integer('MALE_TOILET_NEW',2)->nullable();
            $table->integer('MALE_TOILET_OLD',2)->nullable();
            $table->integer('MALE_TOILET_TOTAL',2)->nullable();
            $table->integer('TEACHER_TOILET_NEW',2)->nullable();
            $table->integer('TEACHER_TOILET_OLD',2)->nullable();
            $table->integer('TEACHER_TOILET_TOTAL',2)->nullable();
            $table->integer('TOILET_STAFF_NEW',2)->nullable();
            $table->integer('TOILET_STAFF_OLD',2)->nullable();
            $table->integer('TOILET_STAFF_TOTAL',2)->nullable();
            $table->integer('TOILET_COMMON_NEW',2)->nullable();
            $table->integer('TOILET_COMMON_OLD',2)->nullable();
            $table->integer('TOILET_COMMON_TOTAL',2)->nullable();
            $table->string('AUTISTIC_SEPERATE_TOILET',1)->nullable();
            $table->string('TOILET_COMMON_CLEAR',1)->nullable();
            $table->string('TOILET_COMMON_WATER',1)->nullable();
            $table->string('HANDWASH_FACILITY_YN',1)->nullable();
            $table->string('TOILET_PAPER_YN',1)->nullable();
            $table->string('HANDWASH_FACILITY_BOYS',2)->nullable();
            $table->string('HANDWASH_FACILITY_GIRLS',2)->nullable();
            $table->string('HANDWASH_FACILITY_TEACHERS',2)->nullable();
            $table->string('WASH_BLOCK_YN',1)->nullable();
            $table->string('WASH_BLOCK_CLEAN_YN',1)->nullable();
            $table->integer('WASH_BLOCK_NUMBER',2)->nullable();
            $table->string('WASH_BLOCK_ENOUGH_YN',1)->nullable();
            $table->string('RUNNING_WATER_YN',1)->nullable();
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
        Schema::dropIfExists('institutes_facilities_others');
    }
}
