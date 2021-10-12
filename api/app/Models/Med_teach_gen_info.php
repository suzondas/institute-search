<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Med_teach_gen_info extends Model
{
    //
    protected $fillable=[
        'teach_name',
        'sex',
        'desig_id',
        'first_joining_date',
        'current_joining_date',
        'birth_date',
        'ssc',
        'hsc',
        'mbbs',
        'bds',
        'fcps',
        'mrcp',
        'frcs',
        'others_degree',
        'basic_salary',
        'others_degree',
        'designation_name_bn'
    ];
}
