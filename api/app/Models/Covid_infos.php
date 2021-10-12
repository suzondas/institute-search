<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Covid_infos extends Model
{
    //
    protected $fillable=[
        '_token',
        'institute_id',
        'online_class_yn',
        'tele_monitoring_yn',
        'lockdown_no_action_yn',
        'online_exam_yn',
        'tv_prog_std_participant',
        'infected_std_total',
        'infected_std_girl',
        'infected_tea_total',
        'infected_tea_female',
        'infected_staff_total',
        'infected_staff_female',
        'died_std_total',
        'died_std_girl',
        'died_tea_total',
        'died_tea_female',
        'died_staff_total',
        'died_staff_female',
        'class_start_yn',
        'year'
    ];
}
