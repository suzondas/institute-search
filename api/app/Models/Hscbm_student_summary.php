<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hscbm_student_summary extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'CUR_ID',
        'TRADE_CODE',
        'TRADE_NAME',
        'ELEVEN_TOTAL',
        'ELEVEN_FEMALE',
        'TWELVE_TOTAL',
        'TWELVE_FEMALE',
        'TOTAL_CANDIDATE',
        'GIRLS_CANDIDATE',
        'TOTAL_PASS',
        'GIRLS_PASS',
        'YEAR'
    ];
}
