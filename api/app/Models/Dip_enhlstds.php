<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dip_enhlstds extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'CUR_ID',
        'TRADE_CODE',
        'TRADE_NAME',
        'FRST_SEM_TOTAL',
        'FRST_SEM_FEMALE',
        'SEC_SEM_TOTAL',
        'SEC_SEM_FEMALE',
        'THRD_SEM_TOTAL',
        'THRD_SEM_FEMALE',
        'FRTH_SEM_TOTAL',
        'FRTH_SEM_FEMALE',
        'FIF_SEM_TOTAL',
        'FIF_SEM_FEMALE',
        'SIX_SEM_TOTAL',
        'SIX_SEM_FEMALE',
        'SEVEN_SEM_TOTAL',
        'SEVEN_SEM_FEMALE',
        'EIGHT_SEM_TOTAL',
        'EIGHT_SEM_FEMALE',
        'TOTAL_CANDIDATE',
        'GIRLS_CANDIDATE',
        'TOTAL_PASS',
        'GIRLS_PASS',
        'YEAR'
    ];
}
