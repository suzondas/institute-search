<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prof_certificate_std extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'SUBJECT_ID',
        'UNDER_ONE_YR_TOT',
        'UNDER_ONE_YR_FEM',
        'ONE_YR_TOT',
        'ONE_YR_FEM',
        'YEAR'
    ];
}
