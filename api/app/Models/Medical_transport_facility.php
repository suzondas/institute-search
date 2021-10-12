<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_transport_facility extends Model
{
    //
    protected $fillable=[
        '_token',
        'car_total',
        'microbus_total',
        'minibus_total',
        'jeep_total',
        'others_total',
        'total_veichals',
        'year'
    ];
}
