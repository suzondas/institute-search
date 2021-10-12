<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_summary_repeater extends Model
{
    //
    protected $guarded = [];
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'SIX_TOTAL',
        'SIX_FEMALE',
        'SEVEN_TOTAL',
        'SEVEN_FEMALE',
        'EIGHT_TOTAL',
        'EIGHT_FEMALE',
        'NINE_TOTAL',
        'NINE_FEMALE',
        'TEN_TOTAL',
        'TEN_FEMALE',
        'ELEVEN_TOTAL',
        'ELEVEN_FEMALE',
        'TWELVE_TOTAL',
        'TWELVE_FEMALE',
        'HONOURS_PASS_TOTAL',
        'HONOURS_PASS_FEMALE',
        'HONOURS_SOMMAN_TOTAL',
        'HONOURS_SOMMAN_FEMALE',
        'MASTERS_TOTAL',
        'MASTERS_FEMALE',
        'EBTEDAYEE_TOTAL',
        'EBTEDAYEE_FEMALE',
        'SSC_VOC_TOTAL',
        'SSC_VOC_FEMALE',
        'HSC_VOC_TOTAL',
        'HSC_VOC_FEMALE',
        'HSC_BM_TOTAL',
        'HSC_BM_FEMALE',
        'TEC_TOTAL',
        'TEC_FEMALE',
        'YEAR'
    ];
}
