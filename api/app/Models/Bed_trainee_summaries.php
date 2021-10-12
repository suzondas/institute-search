<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bed_trainee_summaries extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'education_level_id',
        'class_id',
        'total_student',
        'female_student',
        'total_present',
        'female_present',
        'year'
    ];
}
