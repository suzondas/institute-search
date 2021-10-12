<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesSpecialStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes_special_students', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('SPECIAL_STD_YN',2)->nullable();
            $table->string('DISABLE_FACILITY_AUDIO',1)->nullable();
            $table->string('DISABLE_FACILITY_BRAILLE',1)->nullable();
            $table->string('DISABLE_FACILITY_SIGNLAN',1)->nullable();
            $table->string('DISABLE_FACILITY_ICT',1)->nullable();
            $table->string('DISABLE_FACILITY_OTHERS',1)->nullable();
            $table->string('RAMP_ACCESS_YN',1)->nullable();
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
        Schema::dropIfExists('institutes_special_students');
    }
}
