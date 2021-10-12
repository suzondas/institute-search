<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_dpt_teachers extends Model
{
    protected $fillable = [
        '_token',
        'Institute_id',
        'dept_id',
        'subject_id',
        'dept_name',
        'subject_name',
        'total_prof',
        'female_prof',
        'ptime_prof',
        'total_asso_prof',
        'female_asso_prof',
        'ptime_asso_prof',
        'total_assit_prof',
        'female_assit_prof',
        'ptime_assit_prof',
        'total_lecturer',
        'female_lecturer',
        'ptime_lecturer',
        'total_higher_edu',
        'female_higher_edu',
        'ptime_higher_edu',
        'mfil_higher_edu',
        'phd_higher_edu',
        'others_higher_edu',
        'mfil_female_higher_edu',
        'phd_female_higher_edu',
        'others_female_higher_edu',
        'dept_details',
        'subject_details',
        'faculty_name',
        'total_forigne',
        'female_forigne',
        'year',
    ];
}
