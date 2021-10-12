<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_other_info extends Model
{
    //

    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'OPEN_UNVI_COURSE_YN',
        'YEAR'
    ];
}
