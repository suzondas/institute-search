<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students_open_university extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'ADMIT_YEAR',
        'NINE_TOTAL',
        'NINE_FEMALE',
        'TEN_TOTAL',
        'TEN_FEMALE',
        'ELEVEN_TOTAL',
        'ELEVEN_FEMALE',
        'TWELVE_TOTAL',
        'TWELVE_FEMALE',
        'HONOURS_PASS',
        'HONOURS_PASS_FEMALE',
        'HONOURS',
        'HONOURS_FEMALE',
        'MASTERS',
        'MASTERS_FEMALE',
        'OTHERS',
        'OTHERS_FEMALE',
        'YEAR'
    ];
}
