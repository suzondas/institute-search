<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Covid_std_summaries extends Model
{
    //
    protected $fillable=[
        '_token',
        'institute_id',
        'class_id',
        'before_std_total',
        'before_std_female',
        'before_present_total',
        'before_present_female',
        'after_std_total',
        'after_std_female',
        'after_present_total',
        'after_present_female',
        'year'
    ];
}
