<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Med_teac_staff_summary extends Model
{
    //
    protected $fillable=[
        '_token',
        'DESIGNATION_ID',
        'TOTAL_PRESENT',
        'PERMANENT_TOTAL',
        'PERMANENT_FEMALE',
        'PART_TIME_TOTAL',
        'PART_TIME_FEMALE'
    ];
}
