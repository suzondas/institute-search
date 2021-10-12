<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building_numbers extends Model
{
    //
    protected $fillable=[
        '_token',
        'INSTITUTE_ID',
        'NO_BUILDING_1FLOOR',
        'NO_BUILDING_2FLOOR',
        'NO_BUILDING_3FLOOR',
        'NO_BUILDING_4FLOOR',
        'NO_BUILDING_5FLOOR',
        'NO_BUILDING_5PLUS_FLOOR',
        'OWN_BUILDING',
        'NO_BUILDING',
        'RENTED',
        'PACKA',
        'SEMI_PACKA',
        'KANCHA',
        'NEW_BUILDING',
        'OLD_BUILDING',
        'DAMAGE',
        'ABANDONED',
        'CLASS_ROOM',
        'YEAR'
    ];
}
