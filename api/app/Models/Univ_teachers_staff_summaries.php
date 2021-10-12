<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_teachers_staff_summaries extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'designation_id',
        'teachers_in_service',
        'female_teachers_in_service',
        'total_foreign_trained',
        'female_foreign_trained',
        'year'
    ];
}
