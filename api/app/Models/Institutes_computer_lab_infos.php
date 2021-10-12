<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_computer_lab_infos extends Model
{
    public $timestamps = false;
    protected $fillable=[
        '_token',
        'institute_id',
        'computer_lab_yn',
        'computer_lab_no',
        'total_lab_computer',
        'computer_lab_date',
        'computer_working_lab',
        'laptop_working_lab',
        'computer_workable_lab',
        'computer_notworking_lab',
        'using_hour',
        'using_std_num',
        'computer_yn',
        'computer_working',
        'laptop_working',
        'computer_workable',
        'computer_notworking',
        'lab_edu_ministry',
        'lab_bcc',
        'lab_mausi',
        'lab_eduboard',
        'lab_project',
        'lab_ngo',
        'lab_inst',
        'lab_local_govt',
        'lab_others',
        'moe',
        'bcc',
        'dshe',
        'board',
        'ngo',
        'other',
        'com_project',
        'local_govt',
        'bought',
        'year'
    ];
    protected $dates = ['computer_lab_date'];
    public function getComputerLabDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }
    }
}
