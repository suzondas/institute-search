<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_land_usage extends Model
{
    //
    protected $fillable = [
        '_token',
        'institute_id',
        'total_land_under_control',
        'total_land_outof_control',
        'total_land',
        'attached_land_mauza1',
        'attached_land_khatian1',
        'attached_land_dag1',
        'attached_land_mauza2',
        'attached_land_khatian2',
        'attached_land_dag2',
        'attached_land_mauza3',
        'attached_land_khatian3',
        'attached_land_dag3',
        'attached_land',
        'outside_land_mauza1',
        'outside_land_khatian1',
        'outside_land_dag1',
        'outside_land_mauza2',
        'outside_land_khatian2',
        'outside_land_dag2',
        'outside_land_mauza3',
        'outside_land_khatian3',
        'outside_land_dag3',
        'outside_land',
        'institue_building',
        'play_ground',
        'hostel',
        'teachers_residence',
        'cultivable',
        'pond',
        'garden',
        'sahida_minar',
        'unused',
        'others',
        'total',
        'uni_campus_yn',
        'own_building',
        'rent_building',
        'hall_no_male',
        'hall_no_female',
        'hall_sit_male',
        'hall_sit_female',
        'hall_total_std_male',
        'hall_total_std_female',
        'year',
        'inst_head_residence'
    ];
}
