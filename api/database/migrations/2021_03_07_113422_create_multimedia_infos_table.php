<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediaInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('CLASS_ROOM_MULTIMEDIA',2)->nullable();
            $table->integer('MULTIMEDIA_CLASS_NUM',3)->nullable();
            $table->string('DASHBOARD_ENTRY_YN',1)->nullable();
            $table->string('MULTIMEDIA_USED_STD_NUM',1)->nullable();
            $table->string('MULTIMEDIA_PROJECTOR_YN',1)->nullable();
            $table->string('MULTIMEDIA_PROJECTOR_NUMBER',3)->nullable();
            $table->string('MULT_EXPERT_TEACH_TOT',3)->nullable();
            $table->string('MULT_EXPERT_TEACH_FEM',3)->nullable();
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
        Schema::dropIfExists('multimedia_infos');
    }
}
