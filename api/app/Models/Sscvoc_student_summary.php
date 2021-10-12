<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sscvoc_student_summary extends Model
{
    //
    protected $fillable=[
        '_token',
        'INSTITUTE_ID',
        'CUR_ID',
        'TRADE_CODE',
        'TRADE_NAME',
        'NINE_TOTAL',
        'NINE_FEMALE',
        'TEN_TOTAL',
        'TEN_FEMALE',
        'TOTAL_CANDIDATE',
        'GIRLS_CANDIDATE',
        'TOTAL_PASS',
        'GIRLS_PASS',
        'YEAR'
    ];
}
