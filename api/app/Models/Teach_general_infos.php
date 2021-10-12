<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teach_general_infos extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        '_token',
        'id',
        'institute_id',
        'teach_name',
        'sex',
        'nid',
        'religion',
        'desig_id',
        'teacher_type',
        'subject_id',
        'ntrc_recruitment_yn',
        'recruitment_type',
        'first_joining_date',
        'current_joining_date',
        'mpo_date',
        'dob',
        'ssc',
        'hsc',
        'ba',
        'hons',
        'mst',
        'mphil',
        'phd',
        'bed',
        'med',
        'diploma',
        'baged',
        'prof_degree',
        'bsc_eng',
        'daura_hadish',
        'other_edu',
        'is_inactive',
        'payscale',
        'tin_number',
        'index_no',
        'mobile_number',
        'mob_banking_type',
        'mobile_banking_num',
        'year',
        'other_subject', //newly add
        'prof_diploma', //newly added
        'training_info', //newly added
        'ntrca_reg', //newly added,
        'salary_eft'
    ];
    protected $dates = ['dob','first_joining_date','current_joining_date','mpo_date'];
    public function getDobAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }
    }
    public function getFirstJoiningDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }
    }
    public function getCurrentJoiningDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }
    }
    public function getMpoDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }
    }
}

