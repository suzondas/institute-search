<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivRsdntWsTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_rsdnt_ws_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('RESIENNT_TYPE_ID',10)->nullable();
            $table->string('RESIENNT_TYPE',255)->nullable();
            $table->integer('TOTAL_TEACHER',10)->nullable();
            $table->integer('FEMALE_TEACHER',10)->nullable();
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
        Schema::dropIfExists('univ_rsdnt_ws_teachers');
    }
}
