<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guardian_occupation extends Model
{
    //
    //protected $guarded = [];

    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'OCCUPATION_ID',
        'SIX',
        'SEVEN',
        'EIGHT',
        'NINE',
        'TEN',
        'HSC',
        'HONOURS_PASS',
        'HONOURS_SOMMAN',
        'MASTERS',
        'VOC',
        'YEAR'
    ];

}
