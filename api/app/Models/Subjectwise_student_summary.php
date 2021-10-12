<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjectwise_student_summary extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'SUBJECT_ID',
        'TOTAL_TEACHER',
        'TOTAL_TEACHER_FEMALE',
        'SIX',
        'SIX_FEMALE',
        'SEVEN',
        'SEVEN_FEMALE',
        'EIGHT',
        'EIGHT_FEMALE',
        'NINE',
        'NINE_FEMALE',
        'TEN',
        'TEN_FEMALE',
        'HSC',
        'HSC_FEMALE',
        'HONOURS_PASS',
        'HONOURS_PASS_FEMALE',
        'HONOURS',
        'HONOURS_FEMALE',
        'PR_MASTERS',
        'PR_MASTERS_FEMALE',
        'MASTERS',
        'MASTERS_FEMALE',
        'DAKHIL',
        'DAKHIL_FEMALE',
        'ALIM',
        'ALIM_FEMALE',
        'FAZIL_PASS',
        'FAZIL_PASS_FEMALE',
        'FAZIL_SOMMAN',
        'FAZIL_SOMMAN_FEMALE',
        'KAMIL',
        'KAMIL_FEMALE',
        'YEAR'
    ];

}
