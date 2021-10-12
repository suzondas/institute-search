<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_summary_total extends Model
{
    //protected $guarded = [];

    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'ONE_FIVE_TOTAL',
        'ONE_FIVE_GIRL',
        'SIX_TEN_TOTAL',
        'SIX_TEN_GIRL',
        'ELEVEN_TWELVE_TOTAL',
        'ELEVEN_TWELVE_GIRL',
        'BACHELOR_PASS_TOTAL',
        'BACHELOR_PASS_GIRL',
        'BACHELOR_HONORS_TOTAL',
        'BACHELOR_HONORS_GIRL',
        'MASTERS_TOTAL',
        'MASTERS_GIRL',
        'FAZIL_PASS_TOTAL',
        'FAZIL_PASS_GIRL',
        'FAZIL_HONORS_TOTAL',
        'FAZIL_HONORS_GIRL',
        'KAMIL_TOTAL',
        'KAMIL_GIRL',
        'YEAR',
        'VOC_TOTAL', //added by suzon
        'VOC_GIRL', //added by suzon
        'BM_TOTAL', //added by SAAD
        'BM_GIRL', //added by SAAD
        'TEC_SSC_TOTAL',
        'TEC_SSC_GIRL',
        'TEC_HSC_TOTAL',
        'TEC_HSC_GIRL',
        'DIP_TOTAL',
        'DIP_GIRL',
        'CERTF_TOTAL',
        'CERTF_GIRL'
    ];
}
