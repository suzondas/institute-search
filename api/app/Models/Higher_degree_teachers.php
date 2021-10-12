<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Higher_degree_teachers extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'HIGHER_DEGREE_ID',
        'TOTAL_TEACHER',
        'FEMALE_TEACHER',
        'YEAR'
    ];
}
