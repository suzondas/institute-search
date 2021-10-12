<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building_details extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'YEAR',
        'BUILDING_NAME',
        'FOUNDATION_FLOOR',
        'BUILD_FLOOR',
        'BUILD_YEAR',
        'UPPER_INCREASE_YN'
    ];

}
