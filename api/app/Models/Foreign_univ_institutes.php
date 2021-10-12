<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foreign_univ_institutes extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'SL_NO',
        'UNIV_NAME',
        'COUNTRY_NAME',
        'YEAR'
    ];
}
