<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_students_summary extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'first_yr_total',
        'first_yr_female',
        'first_yr_att_total',
        'first_yr_att_female',
        'first_yr_repeater',
        'second_yr_total',
        'second_yr_female',
        'second_yr_att_total',
        'second_yr_att_female',
        'second_yr_repeater',
        'third_yr_total',
        'third_yr_female',
        'third_yr_att_total',
        'third_yr_att_female',
        'third_yr_repeater',
        'fourth_yr_total',
        'fourth_yr_female',
        'fourth_yr_att_total',
        'fourth_yr_att_female',
        'fourth_yr_repeater',
        'fifth_yr_total',
        'fifth_yr_female',
        'fifth_yr_att_total',
        'fifth_yr_att_female',
        'fifth_yr_repeater',
        'total_std',
        'total_female',
        'total_std_att',
        'total_female_att',
        'total_repeater'
    ];
}
