<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_special_student extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'SPECIAL_STD_YN',
        'DISABLE_FACILITY_AUDIO',
        'DISABLE_FACILITY_BRAILLE',
        'DISABLE_FACILITY_SIGNLAN',
        'DISABLE_FACILITY_ICT',
        'DISABLE_FACILITY_OTHERS',
        'RAMP_ACCESS_YN',
        'YEAR'
    ];
}
