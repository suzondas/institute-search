<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('TYPE',1)->unsigned();
            $table->foreign('TYPE')->references('TYPE')->on('LOOKUP_COMMITTEES');
            $table->integer('TOTAL_MEMBER',3)->nullable();
            $table->integer('TOTAL_FEMALE',3)->nullable();
            $table->date('APPROVE_DATE')->nullable();
            $table->date('EXPIRE_DATE')->nullable();
            $table->date('LAST_COMMITEE_EXPIRE_DATE')->nullable();
            $table->integer('LAST_YR_MEETING',3)->nullable();
            $table->string('MC_TEACHER_TRAINING',1)->nullable();
            $table->string('MC_TEACHER_STD_PRESENT',1)->nullable();
            $table->string('MC_AWARNESS_PROGRAM',1)->nullable();
            $table->string('MC_BULLING_RELATED',1)->nullable();
            $table->string('MC_EVE_TEASING',1)->nullable();
            $table->string('MC_EARLY_MARRIAGE',1)->nullable();
            $table->string('MC_POOR_STD',1)->nullable();
            $table->string('MC_DISABLED_STD',1)->nullable();
            $table->string('MC_STD_TRANSPORT',1)->nullable();
            $table->string('MC_ANTI_DRUG',1)->nullable();
            $table->string('MC_DROPOUT',1)->nullable();
            $table->string('MC_SAFEROAD',1)->nullable();
            $table->string('MC_OTHER',1)->nullable();
            $table->integer('LAST_YR_PTA_MEETING',3)->nullable();
            $table->string('PTA_STD_PRESENT',1)->nullable();
            $table->string('PTAAWARNESSPROGRAM',1)->nullable();
            $table->string('PTA_BULLING_RELATED',1)->nullable();
            $table->string('PTA_EVE_TEASING',1)->nullable();
            $table->string('PTA_EARLY_MARRIAGE',1)->nullable();
            $table->string('PTA_STD_TRANSPORT',1)->nullable();
            $table->string('PTA_ANTI_DRUG',1)->nullable();
            $table->string('PTA_MILITANT',1)->nullable();
            $table->string('PTA_ACID_THROW',1)->nullable();
            $table->string('PTA_OTHER',1)->nullable();
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
        Schema::dropIfExists('committees');
    }
}
