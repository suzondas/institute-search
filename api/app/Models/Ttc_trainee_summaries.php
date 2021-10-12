<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ttc_trainee_summaries extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'education_level_id',
        'class_id',
        'seat',
        'total_trainee',
        'female_trainee',
        'total_present',
        'female_present',
        'total_rep',
        'female_rep',
        'total_drop',
        'female_drop',
        'year'
    ];
}
