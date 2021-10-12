<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_subject_std_summary extends Model
{
    //
    protected $fillable=[
        '_token',
        'institute_id',
        'subject_id',
        'mbbs_seat',
        'mbbs_std_total',
        'mbbs_std_female',
        'mbbs_att_total',
        'mbbs_att_female',
        'mbbs_repeater',
        'bds_seat',
        'bds_std_total',
        'bds_std_female',
        'bds_att_total',
        'bds_att_female',
        'bds_repeater',
        'other_seat',
        'other_std_total',
        'other_std_female',
        'other_att_total',
        'other_att_female',
        'other_repeater'
    ];
}
