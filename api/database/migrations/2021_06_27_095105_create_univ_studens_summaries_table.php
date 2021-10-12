<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnivStudensSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univ_studens_summaries', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('SUBJECT_ID',4);
            $table->string('SUBJECT_NAME',255);
            $table->string('DEPT_NAME',255);
            $table->integer('TOTAL_PASS_GRU',10);
            $table->integer('FEMALE_PASS_GRU',10);
            $table->integer('TOTAL_SIT',10);
            $table->integer('FEMALE_SIT',10);
            $table->integer('TOTAL_HONORS1',10);
            $table->integer('FEMALE_HONORS1',10);
            $table->integer('TOTAL_HONORS2',10);
            $table->integer('FEMALE_HONORS2',10);
            $table->integer('TOTAL_HONORS3',10);
            $table->integer('FEMALE_HONORS3',10);
            $table->integer('TOTAL_HONORS4',10);
            $table->integer('FEMALE_HONORS4',10);
            $table->integer('TOTAL_HONORS5',10);
            $table->integer('FEMALE_HONORS5',10);
            $table->integer('TOTAL_HONORS6',10);
            $table->integer('FEMALE_HONORS6',10);
            $table->integer('TOTAL_HONORS7',10);
            $table->integer('FEMALE_HONORS7',10);
            $table->integer('TOTAL_HONORS8',10);
            $table->integer('FEMALE_HONORS8',10);
            $table->integer('TOTAL_HONORS9',10);
            $table->integer('FEMALE_HONORS9',10);
            $table->integer('TOTAL_HONORS10',10);
            $table->integer('FEMALE_HONORS10',10);
            $table->integer('TOTAL_HONORS11',10);
            $table->integer('FEMALE_HONORS11',10);
            $table->integer('TOTAL_HONORS12',10);
            $table->integer('FEMALE_HONORS12',10);
            $table->integer('TOTAL_MASTERS1',10);
            $table->integer('FEMALE_MASTERS1',10);
            $table->integer('TOTAL_MASTERS2',10);
            $table->integer('FEMALE_MASTERS2',10);
            $table->integer('TOTAL_MASTERS3',10);
            $table->integer('FEMALE_MASTERS3',10);
            $table->integer('TOTAL_MASTERS4',10);
            $table->integer('FEMALE_MASTERS4',10);
            $table->integer('TOTAL_MASTERS5',10);
            $table->integer('FEMALE_MASTERS5',10);
            $table->integer('TOTAL_MASTERS6',10);
            $table->integer('FEMALE_MASTERS6',10);
            $table->integer('TOTAL_MSC',10);
            $table->integer('FEMALE_MSC',10);
            $table->integer('TOTAL_MPHIL',10);
            $table->integer('FEMALE_MPHIL',10);
            $table->integer('TOTAL_PHD',10);
            $table->integer('FEMALE_PHD',10);
            $table->integer('TOTAL_FOREIGN',10);
            $table->integer('FEMALE_FOREIGN',10);
            $table->integer('year',4);
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
        Schema::dropIfExists('univ_studens_summaries');
    }
}
