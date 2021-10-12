<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_services', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->integer('BOYS_SCOUT',3)->nullable();
            $table->integer('GIRLS_GUIDE',3)->nullable();
            $table->integer('ROVER_SCOUT',3)->nullable();
            $table->integer('BNCC',3)->nullable();
            $table->integer('RED_CRESENT',3)->nullable();
            $table->integer('STUDENT_CABINAT',3)->nullable();
            $table->integer('HEALTH_SERVICE',3)->nullable();
            $table->integer('TRANSPORT',3)->nullable();
            $table->integer('CANTAIN',3)->nullable();
            $table->integer('KAB',3)->nullable();
            $table->integer('COUNCILING_SERVICE',3)->nullable();
            $table->string('BANKACCOUNTYN',1)->nullable();
            $table->string('SCOUTGUIDEACCOUNTYN',1)->nullable();
            $table->string('SCOUTTROOPMEETINGYN',1)->nullable();
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
        Schema::dropIfExists('community_services');
    }
}
