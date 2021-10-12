<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_desig_wise_teachers extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'designation_id',
        'approved_post_no',
        'teachers_in_service',
        'female_teachers_in_service',
        'parttime_teacher',
        'parttime_teacher_female',
        'total_foreign_trained',
        'female_foreign_trained',
        'foreign_teacher_total',
        'foreign_teacher_female',
        'year'
    ];
}
