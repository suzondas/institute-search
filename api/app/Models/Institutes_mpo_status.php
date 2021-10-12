<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_mpo_status extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'EDUCATION_LEVEL_ID',
        'mpo_date',
        'year'
    ];

    public function getMpoDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }
}
