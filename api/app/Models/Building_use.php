<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building_use extends Model
{
    //
    protected $fillable=[
        '_token',
        'INSTITUTE_ID',
        'OFFICE_ROOM',
        'INST_HEAD_ROOM',
        'TEACHERS_ROOM',
        'CLASS_ROOM',
        'LABORATORY',
        'LIBRARY',
        'MALE_COMMON_ROOM',
        'FEMALE_COMMON_ROOM',
        'SICK_ROOM',
        'HOSTEL',
        'HOSTAL_SIT',
        'RESIDENT_BOY_TOTAL',
        'GIRLS_HOSTAL',
        'GIRLS_HOSTAL_SIT',
        'RESIDENT_GIRL_TOTAL',
        'TEACHERS_RESIDENCE',
        'TEACHERS_RESIDENCE_SIT',
        'RESIDENT_TEACHER_TOTAL',
        'AUTISTIC_REST_ROOM',
        'COUNSELING_ROOM',
        'EDU_INSTRUMENT_ROOM',
        'OTHERS',
        'MOSJID',
        'PRAYER_ROOM',
        'MONDIR',
        'GIRJA',
        'pagoda',
        'OTHER_RELIGIOUS_PLACE',
        'YEAR'
    ];
}
