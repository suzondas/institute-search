<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryAuditInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_audit_infos', function (Blueprint $table) {
            $table->id();
            $table->string('INSTITUTE_ID',15)->unsigned();
            $table->foreign('INSTITUTE_ID')->references('INSTITUTE_ID')->on('INSTITUTES');
            $table->string('REGULAR_AUDIT_YN',1)->nullable();
            $table->string('DIA_AUDIT_YN',1)->nullable();
            $table->integer('LAST_DIA_AUDIT_YEAR',4)->nullable();
            $table->string('AUDIT_OBJECTION_YN',1)->nullable();
            $table->integer('AUDIT_OBJECTION_NO',2)->nullable();
            $table->integer('AUDIT_OBJECTION_AMT',4)->nullable();
            $table->string('AUDIT_OBJECTION_SUBJECT',200)->nullable();
            $table->string('REVENUE_AUDIT_YN',1)->nullable();
            $table->string('NATIONAL_DAY_CELEBRATE',1)->nullable();
            $table->string('NEWSPAPER_YN',1)->nullable();
            $table->integer('NEWSPAPER_NUM',2)->nullable();
            $table->string('PUBLIC_EXEM_CENTER_YN',1)->nullable();
            $table->string('EXAM_DAY_REDUCE_ADVICE',200)->nullable();
            $table->string('STD_UNIFORM_YN',1)->nullable();
            $table->string('STD_IDCARD_YN',1)->nullable();
            $table->string('STD_LONG_ABSENT_YN',1)->nullable();
            $table->string('ACADEMY_CALENDAR_YN',1)->nullable();
            $table->string('PARENTS_DAY_YN',1)->nullable();
            $table->string('YEARLY_CALENDER_YN',1)->nullable();
            $table->string('STAFF_UNIFORM_YN',1)->nullable();
            $table->string('INST_CASE_YN',1)->nullable();
            $table->string('INST_CASE_NO',2)->nullable();
            $table->string('INST_CASE_DETAILS',200)->nullable();
            $table->string('SMC_REGISTER_YN',1)->nullable();
            $table->string('PTA_REGISTER_YN',1)->nullable();
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
        Schema::dropIfExists('summary_audit_infos');
    }
}
