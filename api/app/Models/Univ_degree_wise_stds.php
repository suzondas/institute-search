<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_degree_wise_stds extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'degree_id',
        'subject_id',
        'degree_name',
        'subject_name',
        'total_student',
        'female_student',
        'degree_details',
        'subject_details',
        'total_passed',
        'female_passed',
        'sesion'
    ];
}
