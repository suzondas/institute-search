<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_facilities_others extends Model
{
    //
    protected $fillable = [
        '_token',
        'institute_id',
        'shaid_menar_yn',
        'permanent_altar_yn',
        'sotota_store_yn',
        'gas_connection_yn',
        'hand_sanitizer_yn',
        'soap_yn',
        'boundarywall_yn',
        'boundary_status',
        'boundary_type',
        'boundary_year',
        'pure_drinking_water',
        'kup',
        'tubewl',
        'deep_tubewel',
        'supply_water',
        'jhorna',
        'bottle_water',
        'rain_water',
        'arsenic_test',
        'arsenic_result',
        'manganese_test',
        'manganese_result',
        'water_purifier_machine',
        'toilet_facilities_yn',
        'slub_toilet',
        'toilet_with_flash',
        'toilet_without_flash',
        'kacha_toilet',
        'usable_toilet',
        'unusable_toilet',
        'tot_us_toilet',
        'attached_toilet_inst_head',
        'female_seperate_toilet',
        'female_toilet_new',
        'female_toilet_old',
        'female_toilet_total',
        'male_toilet_new',
        'male_toilet_old',
        'male_toilet_total',
        'teacher_toilet_new',
        'teacher_toilet_old',
        'teacher_toilet_total',
        'toilet_staff_new',
        'toilet_staff_old',
        'toilet_staff_total',
        'toilet_common_new',
        'toilet_common_old',
        'toilet_common_total',
        'autistic_seperate_toilet',
        'toilet_common_clear',
        'toilet_common_water',
        'handwash_facility_yn',
        'toilet_paper_yn',
        'handwash_facility_boys',
        'handwash_facility_girls',
        'handwash_facility_teachers',
        'wash_block_yn',
        'wash_block_clean_yn',
        'wash_block_number',
        'wash_block_enough_yn',
        'running_water_yn',
        'equipment_room_yn',
        'lift_yn',
        'lift_number',
        'year'
    ];
}
