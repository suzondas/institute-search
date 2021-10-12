<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivForeignStdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_foreign_stds', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('DEPT_ID',10)->nullable();
            $table->integer('SUBJECT_ID',10)->nullable();
            $table->string('DEPT_NAME',255)->nullable();
            $table->string('SUBJECT_NAME',255)->nullable();
            $table->integer('RESH_DEGIS_ID',10)->nullable();
            $table->string('RESH_DEGIS_NAME',255)->nullable();
            $table->integer('FUNDING_FULL_ID',10)->nullable();
            $table->string('FUNDING_FULL_NAME',255)->nullable();
            $table->integer('FUNDING_PART_ID',10)->nullable();
            $table->string('FUNDING_PART_NAME',255)->nullable();
            $table->integer('OTHER_FUNDING_FULL',10)->nullable();
            $table->string('OTHER_FUNDING_PART',255)->nullable();
            $table->integer('TOTAL_FORIGNE',10)->nullable();
            $table->integer('FEMALE_FORIGNE',10)->nullable();
            $table->integer('TOTAL_FULL',10)->nullable();
            $table->integer('FEMALE_FULL',10)->nullable();
            $table->integer('TOTAL_PART',10)->nullable();
            $table->integer('FEMALE_PART',10)->nullable();
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
        Schema::dropIfExists('univ_foreign_stds');
    }
}
