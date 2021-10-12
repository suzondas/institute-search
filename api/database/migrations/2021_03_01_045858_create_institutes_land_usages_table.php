<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesLandUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes_land_usages', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('TOTAL_LAND_UNDER_CONTROL',10)->nullable();
            $table->integer('TOTAL_LAND_OUTOF_CONTROL',10)->nullable();
            $table->integer('TOTAL_LAND',10)->nullable();
            $table->string('ATTACHED_LAND_MAUZA1',300)->nullable();
            $table->string('ATTACHED_LAND_KHATIAN1',300)->nullable();
            $table->string('ATTACHED_LAND_DAG1',300)->nullable();
            $table->string('ATTACHED_LAND_MAUZA2',300)->nullable();
            $table->string('ATTACHED_LAND_KHATIAN2',300)->nullable();
            $table->string('ATTACHED_LAND_DAG2',300)->nullable();
            $table->string('ATTACHED_LAND_MAUZA3',300)->nullable();
            $table->string('ATTACHED_LAND_KHATIAN3',300)->nullable();
            $table->string('ATTACHED_LAND_DAG3',300)->nullable();
            $table->integer('ATTACHED_LAND',10)->nullable();
            $table->string('OUTSIDE_LAND_MAUZA1',300)->nullable();
            $table->string('OUTSIDE_LAND_KHATIAN1',300)->nullable();
            $table->string('OUTSIDE_LAND_DAG1',300)->nullable();
            $table->string('OUTSIDE_LAND_MAUZA2',300)->nullable();
            $table->string('OUTSIDE_LAND_KHATIAN2',300)->nullable();
            $table->string('OUTSIDE_LAND_DAG2',300)->nullable();
            $table->string('OUTSIDE_LAND_MAUZA3',300)->nullable();
            $table->string('OUTSIDE_LAND_KHATIAN3',300)->nullable();
            $table->string('OUTSIDE_LAND_DAG3',300)->nullable();
            $table->integer('OUTSIDE_LAND',10)->nullable();
            $table->integer('INSTITUE_BUILDING',7)->nullable();
            $table->integer('PLAY_GROUND',7)->nullable();
            $table->integer('HOSTEL',7)->nullable();
            $table->integer('TEACHERS_RESIDENCE',7)->nullable();
            $table->integer('CULTIVABLE',7)->nullable();
            $table->integer('POND',7)->nullable();
            $table->integer('GARDEN',7)->nullable();
            $table->integer('SAHIDA_MINAR',7)->nullable();
            $table->integer('UNUSED',7)->nullable();
            $table->integer('OTHERS',7)->nullable();
            $table->integer('TOTAL',8,2)->nullable();
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
        Schema::dropIfExists('institutes_land_usages');
    }
}
