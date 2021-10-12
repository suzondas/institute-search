<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_ict_infos extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'COMPUTER_TEACHING_YN',
        'COMP_TEACHER_YN',
        'COMP_TEACHER_QUAL',
        'COMP_TEACHER_OTHER_EDU',
        'COMP_TRAINING_TYPE',
        'TEA_SOCITY_MEMBER_YN',
        'TEA_SOCITY_MEMBER_TOTAL',
        'TEA_SOCITY_MEMBER_FEMALE',
        'COMP_LAB_DAILY_USE_HR',
        'DIGITAL_ATTENDANCE_STD',
        'DIGITAL_ATTENDANCE_STAFF',
        'DIGITAL_ATTENDANCE_YN',
        'ELECTRICITY_YN',
        'ELECTRICITY_CONN',
        'SOLAR_PANNEL_CONN',
        'GENERATOR_CONN',
        'OTHER_CONN',
        'SOLAR_PANEL_YN',
        'SOLAR_FAN',
        'SOLAR_LIGHT',
        'INTERNET_CONN_YN',
        'INTERNET_CONN_TYPE',
        'BANDWITH_MPBS',
        'WIFI_YN',
        'PADAGO_COMPUTER_YN',
        'DSKTOP_PADAGOGICAL',
        'LAPTOP_PADAGOGICAL',
        'PADAGOGICAL_COMPUTER',
        'PADAGO_INTERNET_YN',
        'PADAGO_INTERNET_STD',
        'PADAGO_INTERNET_TEA',
        'PADAGO_INTERNET_STD_TEA',
        'BASIC_COURSE_YN',
        'BASIC_COURSE_TOTAL_6TO8',
        'BASIC_COURSE_FEMALE_6TO8',
        'BASIC_COURSE_TOTAL_9TO10',
        'BASIC_COURSE_FEMALE_9TO10',
        'BASIC_COURSE_TOTAL_11TO12',
        'BASIC_COURSE_FEMALE_11TO12',
        'BASIC_COURSE_HN_PASS',
        'BASIC_COURSE_HN_PASS_FEM',
        'BASIC_COURSE_HN',
        'BASIC_COURSE_HN_FEM',
        'BASIC_COURSE_MAS',
        'BASIC_COURSE_MAS_FEM',
        'CC_CAMERA_NUM',
        'CC_CAMERA_YN',
        'CC_CAMERA_YN',
        'YEAR'
    ];
}
