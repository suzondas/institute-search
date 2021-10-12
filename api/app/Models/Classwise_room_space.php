<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classwise_room_space extends Model
{
    //
    protected $fillable=[
        '_token',
        'INSTITUTE_ID',
        'CLASS_ID',
        'PACKA',
        'SEMI_PACKA',
        'KANCHA',
        'PACKA_SFT',
        'SEMI_PACKA_SFT',
        'KANCHA_SFT',
        'YEAR'
    ];
}
