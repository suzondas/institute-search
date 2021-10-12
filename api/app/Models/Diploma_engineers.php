<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diploma_engineers extends Model
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
        'TOTAL_PRESENT',
        'FEMALE_PRESENT',
        'TRANSFER_IN',
        'TRANSFER_OUT',
        'GOVT_MALE_STIPEND',
        'GOVT_FEMALE_STIPEND',
        'PR_MALE_STIPEND',
        'PR_FEMALE_STIPEND',
        'GPR_MALE_STIPEND',
        'GPR_FEMALE_STIPEND',
        'MALE_SCHOLARSHIP',
        'FEMALE_SCHOLARSHIP',
        'TOTAL_REP',
        'FEMALE_REP',
        'NEXTYR_BOOK_REG',
        'YEAR'
    ];
}
