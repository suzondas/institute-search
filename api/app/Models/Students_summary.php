<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students_summary extends Model
{
    //
    protected $guarded = [];
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
        'MALE_STIPEND',
        'FEMALE_STIPEND',
        'MALE_SCHOLARSHIP',
        'FEMALE_SCHOLARSHIP',
        'TOTAL_ENG',
        'FEMALE_ENG',
        'NEXTYR_BOOK_REG',
        'YEAR',
        'SEAT',
        'FOREIGN_TOT',
        'FOREIGN_FEMALE',
        'BRANCH_AMNT'
    ];
}
