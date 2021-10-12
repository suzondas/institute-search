<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachGeneralInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teach_general_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('TEACH_NAME',250)->nullable();
            $table->string('SEX',1)->nullable();
            $table->string('NID',100)->nullable();
            $table->string('RELIGION',30)->nullable();
            $table->string('DESIG_ID',30)->nullable();
            $table->string('TEACHER_TYPE',20)->nullable();
            $table->string('SUBJECT_ID',3)->nullable();
            $table->string('NTRC_RECRUITMENT_YN',1)->nullable();
            $table->string('RECRUITMENT_TYPE',100)->nullable();
            $table->date('FIRST_JOINING_DATE')->nullable();
            $table->date('CURRENT_JOINING_DATE')->nullable();
            $table->date('MPO_DATE')->nullable();
            $table->date('DOB')->nullable();
            $table->string('SSC',4)->nullable();
            $table->string('HSC',4)->nullable();
            $table->string('BA',4)->nullable();
            $table->string('HONS',4)->nullable();
            $table->string('MST',4)->nullable();
            $table->string('MPHIL',4)->nullable();
            $table->string('PHD',4)->nullable();
            $table->string('BED',4)->nullable();
            $table->string('MED',4)->nullable();
            $table->string('DIPLOMA',4)->nullable();
            $table->string('BAGED',4)->nullable();
            $table->string('PROF_DEGREE',4)->nullable();
            $table->string('BSC_ENG',4)->nullable();
            $table->string('DAURA_HADISH',4)->nullable();
            $table->string('OTHER_EDU',300)->nullable();
            $table->string('IS_INACTIVE',1)->nullable();
            $table->string('PAYSCALE',10)->nullable();
            $table->string('TIN_NUMBER',100)->nullable();
            $table->string('INDEX_NO',50)->nullable();
            $table->string('MOBILE_NUMBER',50)->nullable();
            $table->string('MOB_BANKING_TYPE',100)->nullable();
            $table->string('MOBILE_BANKING_NUM',50)->nullable();
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
        Schema::dropIfExists('teach_general_infos');
    }
}
