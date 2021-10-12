<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_recognition extends Model
{

    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'EDUCATION_LEVEL_ID',
        'RECOGNITION_DATE',
        'RECOGNITION_EXPIRE_DATE',
        'PERMITTED_DATE',
        'YEAR',
        'RECOGNITION_STATUS'
    ];

    public function education_level()
    {
        return $this->hasOne(Lookup_education_levels::class, 'education_level_id', 'education_level_id');
    }

    public function classes()
    {
        return $this->hasMany(Classes::class, 'education_level_id', 'education_level_id');
    }

    public function groups()
    {
        return $this->hasMany(Groups::class, 'education_level_id', 'education_level_id');
    }

    public function getRecognitionDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getRecognitionExpireDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getPermittedDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

}
