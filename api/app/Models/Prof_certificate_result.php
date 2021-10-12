<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prof_certificate_result extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'UNDER_ONE_YR_STD_TOT',
        'UNDER_ONE_YR_STD_FEM',
        'ONE_YR_STD_TOT',
        'ONE_YR_STD_FEM',
        'UNDER_ONE_YR_PASS_TOT',
        'UNDER_ONE_YR_PASS_FEM',
        'ONE_YR_PASS_TOT',
        'ONE_YR_PASS_FEM',
        'UNDER_ONE_YR_FAIL_TOT',
        'UNDER_ONE_YR_FAIL_FEM',
        'ONE_YR_FAIL_TOT',
        'ONE_YR_FAIL_FEM',
        'YEAR'
        ];
}
