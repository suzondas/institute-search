<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inst_mpo_conditions extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'year',
        'std_6_8',
        'std_9_10',
        'std_sc_11_12',
        'std_ar_11_12',
        'std_com_11_12',
        'std_sc_13_15',
        'std_ar_13_15',
        'std_com_13_15',
        'std_dak_1_10',
        'std_alim_11_12',
        'std_faz_13_15',
        'std_kam_16_17'
    ];
}
