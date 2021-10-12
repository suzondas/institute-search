<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_categorywise_disable extends Model
{
    //
    protected $fillable=[
        '_token',
        'institute_id',
        'disable_type',
        'mbbs_disable_total',
        'mbbs_disable_female',
        'bds_disable_total',
        'bds_disable_female',
        'total_disable_std',
        'total_disable_female'
    ];
}
