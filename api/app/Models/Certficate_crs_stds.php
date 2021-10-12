<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certficate_crs_stds extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'CUR_ID',
        'TRADE_CODE',
        'TRADE_NAME',
        'BAS_6MOTN_TOT',
        'BAS_6MOTN_FEM',
        'BAS_1YR_TOT',
        'BAS_1YR_FEM',
        'BAS_2YR_TOT',
        'BAS_2YR_FEM',
        'TOTAL_CANDIDATE',
        'GIRLS_CANDIDATE',
        'TOTAL_PASS',
        'GIRLS_PASS',
        'YEAR'
    ];
}
