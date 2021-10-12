<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprenership_stds extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'EN_15_24_TOT',
        'EN_25_PLUS_TOT',
        'YEAR'
    ];
}
