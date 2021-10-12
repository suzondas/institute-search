<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sectionwise_student_summary extends Model
{
    //

    protected $fillable=[
        '_token',
        'INSTITUTE_ID',
        'SEVEN',
        'SIX',
        'SEVEN',
        'EIGHT',
        'NINE_SCIENCE',
        'NINE_ARTS',
        'NINE_COMMERCE',
        'TEN_SCIENCE',
        'TEN_ARTS',
        'TEN_COMMERCE',
        'NINE_GENERAL',
        'NINE_BUSINESS',
        'NINE_MOZZABID',
        'NINE_HIFZUL',
        'TEN_GENERAL',
        'TEN_MOZZABID',
        'TEN_HIFZUL',
        'TEN_BUSINESS',
        'TOTAL',
        'PERMITTED',
        'YEAR'
    ];
}
