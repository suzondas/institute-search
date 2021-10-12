<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers_staff_summaries extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'designation_id',
        'approved_post_no',
        'teachers_in_service',
        'female_teachers_in_service',
        'mpo_teachers',
        'female_mpo_teachers',
        'blank_post_no',
        'brance_teacher',
        'parttime_teacher',
        'female_parttime_teacher',
        'ntrc_teacher',
        'ntrc_blank_post',
        'foreign_total',
        'foreign_female',
        'year'
    ];
}
