<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher_quali_summary extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'QULI_ID',
        'TOTAL_TEACHER',
        'FEMALE_TEACHER',
        'YEAR'
    ];
}
