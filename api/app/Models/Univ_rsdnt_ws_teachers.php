<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_rsdnt_ws_teachers extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'designation_id',
        'resiennt_type_id',
        'resiennt_type',
        'total_teacher',
        'female_teacher',
        'year'
    ];
}
