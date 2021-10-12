<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committees extends Model
{
    //

    protected $fillable=[
        '_token',
        'institute_id',
        'type',
        'total_member',
        'total_female',
        'approve_date',
        'expire_date',
        'last_commitee_expire_date',
        'last_yr_meeting',
        'mc_teacher_training',
        'mc_teacher_std_present',
        'mc_awarness_program',
        'mc_bulling_related',
        'mc_eve_teasing',
        'mc_early_marriage',
        'mc_poor_std',
        'mc_disabled_std',
        'mc_std_transport',
        'mc_anti_drug',
        'mc_dropout',
        'mc_saferoad',
        'mc_other',
        'last_yr_pta_meeting',
        'pta_std_present',
        'ptaawarnessprogram',
        'pta_bulling_related',
        'pta_eve_teasing',
        'pta_early_marriage',
        'pta_std_transport',
        'pta_anti_drug',
        'pta_militant',
        'pta_acid_throw',
        'pta_other',
        'year',
        'commitee_status'
    ];

    public function getApproveDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }
    }

    public function getExpireDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getLastCommiteeExpireDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

}
