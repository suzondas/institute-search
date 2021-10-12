<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary_audit_infos extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'REGULAR_AUDIT_YN',
        'DIA_AUDIT_YN',
        'LAST_DIA_AUDIT_YEAR',
        'AUDIT_OBJECTION_YN',
        'AUDIT_OBJECTION_NO',
        'AUDIT_OBJECTION_AMT',
        'AUDIT_OBJECTION_SUBJECT',
        'REVENUE_AUDIT_YN',
        'NATIONAL_DAY_CELEBRATE',
        'NEWSPAPER_YN',
        'NEWSPAPER_NUM',
        'PUBLIC_EXEM_CENTER_YN',
        'EXAM_DAY_REDUCE_ADVICE',
        'STD_UNIFORM_YN',
        'STD_IDCARD_YN',
        'STD_LONG_ABSENT_YN',
        'ACADEMY_CALENDAR_YN',
        'PARENTS_DAY_YN',
        'YEARLY_CALENDER_YN',
        'STAFF_UNIFORM_YN',
        'INST_CASE_YN',
        'INST_CASE_NO',
        'INST_CASE_DETAILS',
        'SMC_REGISTER_YN',
        'PTA_REGISTER_YN',
        'YEAR',
        'ANUAL_PLAN_YN'
    ];
}
