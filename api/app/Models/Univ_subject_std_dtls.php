<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Univ_subject_std_dtls extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'dept_id',
        'dept_name',
        'degree_id',
        'degree_name',
        'total_std_1st',
        'female_std_1st',
        'total_std_2nd',
        'female_std_2nd',
        'total_std_3rd',
        'female_std_3rd',
        'total_std_4th',
        'female_std_4th',
        'total_std_5th',
        'female_std_5th',
        'total_std_6th',
        'female_std_6th',
        'total_std_7th',
        'female_std_7th',
        'total_std_8th',
        'female_std_8th',
        'total_std_9th',
        'female_std_9th',
        'total_std_10th',
        'female_std_10th',
        'total_std_11th',
        'female_std_11th',
        'total_std_12th',
        'female_std_12th',
        'total_std',
        'female_std',
        'section_total',
        'total_passed',
        'female_passed',
        'year'
    ];
}
