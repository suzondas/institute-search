<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_summary_prev_year extends Model
{

    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'EDUCATION_LEVEL_ID',
        'CLASS_ID',
        'GROUP_ID',
        'TOTAL_STUDENT',
        'FEMALE_STUDENT',
        'TOTAL_CANDIDATE',
        'FEMALE_CANDIDATE',
        'TOTAL_PROMOTED',
        'FEMALE_PROMOTED',
        'TOTAL_FAILED',
        'FEMALE_FAILED',
        'YEAR'
    ];

}
