<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesComputerLabInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes_computer_lab_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('COMPUTER_LAB_YN',1)->nullable();
            $table->integer('COMPUTER_LAB_NO',2)->nullable();
            $table->integer('TOTAL_LAB_COMPUTER',4)->nullable();
            $table->date('COMPUTER_LAB_DATE')->nullable();
            $table->integer('COMPUTER_WORKING_LAB',4)->nullable();
            $table->integer('LAPTOP_WORKING_LAB',4)->nullable();
            $table->integer('COMPUTER_WORKABLE_LAB',4)->nullable();
            $table->integer('COMPUTER_NOTWORKING_LAB',4)->nullable();
            $table->integer('USING_HOUR',4)->nullable();
            $table->integer('USING_STD_NUM',4)->nullable();
            $table->string('COMPUTER_YN',1)->nullable();
            $table->integer('COMPUTER_WORKING',4)->nullable();
            $table->integer('LAPTOP_WORKING',4)->nullable();
            $table->integer('COMPUTER_WORKABLE',4)->nullable();
            $table->integer('COMPUTER_NOTWORKING',4)->nullable();
            $table->string('LAB_EDU_MINISTRY',1)->nullable();
            $table->string('LAB_BCC',1)->nullable();
            $table->string('LAB_MAUSI',1)->nullable();
            $table->string('LAB_EDUBOARD',1)->nullable();
            $table->string('LAB_PROJECT',1)->nullable();
            $table->string('LAB_NGO',1)->nullable();
            $table->string('LAB_INST',1)->nullable();
            $table->string('LAB_LOCAL_GOVT',1)->nullable();
            $table->string('LAB_OTHERS',1)->nullable();
            $table->integer('MOE',3)->nullable();
            $table->integer('BCC',3)->nullable();
            $table->integer('DSHE',3)->nullable();
            $table->integer('BOARD',3)->nullable();
            $table->integer('NGO',3)->nullable();
            $table->integer('OTHER',3)->nullable();
            $table->integer('COM_PROJECT',3)->nullable();
            $table->integer('LOCAL_GOVT',3)->nullable();
            $table->integer('BOUGHT',3)->nullable();
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
        Schema::dropIfExists('institutes_computer_lab_infos');
    }
}
