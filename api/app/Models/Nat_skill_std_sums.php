<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nat_skill_std_sums extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'CUR_ID',
        'TRADE_CODE',
        'TRADE_NAME',
        'ONE_YR_TOTAL',
        'ONE_YR_FEMALE',
        'TOTAL_CANDIDATE',
        'GIRLS_CANDIDATE',
        'TOTAL_PASS',
        'GIRLS_PASS',
        'YEAR'
    ];
}
