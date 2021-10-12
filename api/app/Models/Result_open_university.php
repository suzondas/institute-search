<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result_open_university extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'NINE_STD',
        'NINE_FEMALE',
        'NINE_PASS',
        'NINE_FEM_PASS',
        'TEN_STD',
        'TEN_FEM_STD',
        'TEN_PASS',
        'TEN_FEM_PASS',
        'ELEVEN_STD',
        'ELEVEN_FEM_STD',
        'ELEVEN_PASS',
        'ELEVEN_FEM_PASS',
        'TWELVE_STD',
        'TWELVE_FEM_STD',
        'TWELVE_PASS',
        'TWELVE_FEM_PASS',
        'HONOURS_P_STD',
        'HONOURS_P_FEM_STD',
        'HONOURS_P_PASS',
        'HONOURS_P_FEM_PASS',
        'HONOURS_STD',
        'HONOURS_FEM_STD',
        'HONOURS_PASS',
        'HONOURS_FEM_PASS',
        'MASTERS_STD',
        'MASTERS_FEM_STD',
        'MASTERS_PASS',
        'MASTERS_FEM_PASS',
        'OTHERS_STD',
        'OTHERS_FEMALE',
        'OTHERS_PASS',
        'OTHERS_FEM_PASS',
        'YEAR'
    ];
}
