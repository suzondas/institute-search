<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yr_wise_hscvocs extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'EDUCATION_LEVEL_ID',
        'CLASS_ID',
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
        'TOTAL_REP',
        'FEMALE_REP',
        'NEXTYR_BOOK_REG',
        'YEAR'
    ];
}
