<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technical_teachers_summaries extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'DESIGNATION_ID',
        'TEACHERS_IN_SERVICE',
        'FEMALE_TEACHERS_IN_SERVICE',
        'MPO_TEACHERS',
        'FEMALE_MPO_TEACHERS',
        'BLANK_POST_NO',
        'YEAR'
    ];
}
