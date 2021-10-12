<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_resh_wise_teachers extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'dept_name',
        'faculty_name',
        'resh_degis_id',
        'resh_degis_name',
        'funding_full_id',
        'funding_full_name',
        'funding_part_id',
        'funding_part_name',
        'other_funding_full',
        'other_funding_part',
        'subject_name',
        'dept_id',
        'subject_id',
        'total_forigne',
        'female_forigne',
        'total_full',
        'female_full',
        'total_part',
        'female_part',
        'dept_details',
        'subject_details',
        'sub_name',
        'year'
    ];
}
