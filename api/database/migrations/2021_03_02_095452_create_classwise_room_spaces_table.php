<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasswiseRoomSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classwise_room_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('CLASS_ID',15)->unsigned();
            $table->foreign('CLASS_ID')->references('CLASS_ID')->on('classes');
            $table->integer('PACKA',3)->nullable();
            $table->integer('SEMI_PACKA',3)->nullable();
            $table->integer('KANCHA',3)->nullable();
            $table->integer('PACKA_SFT',3)->nullable();
            $table->integer('SEMI_PACKA_SFT',3)->nullable();
            $table->integer('KANCHA_SFT',3)->nullable();
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
        Schema::dropIfExists('classwise_room_spaces');
    }
}
