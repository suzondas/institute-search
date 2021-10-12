<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_crs_wise_stds extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'course_id',
        'course_time',
        'course_name',
        'total_student',
        'female_student',
        'year'
    ];
}
