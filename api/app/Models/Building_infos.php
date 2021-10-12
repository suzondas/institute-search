<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building_infos extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'OLDEST_BUILDING_ESTAB_YEAR',
        'LATEST_BUILDING_ESTAB_YEAR',
        'LATEST_BUILDING_MONEY_SOURCE',
        'TOTAL_BUILDING_AREA_SFT',
        'LATEST_BUILDING_AREA_SFT',
        'INST_BUILDING_TYPE',
        'YEAR'
    ];
}
