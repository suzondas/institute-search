<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prof_students_summary extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'SUBJECT_ID',
        'SUBJECT_NAME',
        'FIRST_YR_TOT',
        'FIRST_YR_FEM',
        'SECOND_YR_TOT',
        'SECOND_YR_FEM',
        'THIRD_YR_TOT',
        'THIRD_YR_FEM',
        'FOURTH_YR_TOT',
        'FOURTH_YR_FEM',
        'FIFTH_YR_TOT',
        'FIFTH_YR_FEM',
        'MASTERS_TOT',
        'MASTERS_FEM',
        'REPEATER_TOT',
        'REPEATER_FEM',
        'YEAR'
    ];
}
