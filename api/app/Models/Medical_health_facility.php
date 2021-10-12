<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical_health_facility extends Model
{
    //
    protected $fillable=[
        '_token',
        'institute_id',
        'ambulance_number',
        'bed_number',
        'cost_tk',
        'fund_amoount',
        'nurse_female',
        'nurse_male',
        'patient_treated',
        'permitted_doctors',
        'seperate_fund_yn',
        'seperate_medical_yn',
        'staff_female',
        'staff_male',
        'working_doc_female',
        'working_doc_male',
        'year'
    ];
}
