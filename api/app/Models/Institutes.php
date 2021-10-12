<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes extends Model
{


    protected $primaryKey = 'institute_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        '_token',
        'institute_id',
        'eiin',
        'latitude',
        'longitude',
        'institute_name_new',
        'institute_name_bangla',
        'location',
        'post_office',
        'post_code',
        'union_id',
        'mauza_id',
        'thana_id',
        'district_id',
        'division_id',
        'mobphone',
        'telephone',
        'mobphone_alternate',
        'e_mail',
        'web_site',
        'ec_national_code',
        'ec_district_code',
        'education_level_id',
        'arts_group',
        'science_group',
        'commerce_group',
        'arts_group_col',
        'science_group_col',
        'commerce_group_col',
        'social_science_group',
        'islamic_stadies_group',
        'music_group',
        'home_economic_group',
        'other_group',
        'technical_branch_type_agro',
        'technical_branch_type_fish',
        'technical_branch_type',
        'technical_branch_type_bm',
        'technical_branch_type_hscvoc',
        'establish_date',
        'english_ver_yn',
        'management',
        'nationalization_date',
        'for_whom',
        'geographical_status',
        'area_status1',
        'admin_unit_communication',
        'nearest_admin_unit_distant',
        'nearest_inst_distant',
        'branch_yn',
        'branch_no',
        'campus_yn',
        'attach_inst_yn',
        'mpo_status',
        'technical_branch_mpo_status',
        'year',
        'double_shipt_yn',
        'institute_code',
        'shift_no',
        'recognition',
        'national_university_code',
        'school_code',
        'college_code',
        'university_code',
        'technical_code',
        'mpo_code_school',
        'mpo_code_college',
        'mpo_code_technical',
        'mpo_code_madrasah',
        'hifjul_group',
        'mojjabid_group',
        'arts_college',
        'science_college',
        'commerce_college',
        'board_code',
        'technical_branch_both',
        'mpo_code_bm',
        'establish_date_voc',
        'establish_date_bm',
        'recognition_col',
        'establish_date_college',
        'constituency',
        'constitute_no',
        'establish_date_hscvoc',
        'establish_date_diploma',
        'establish_date_agri_diploma',
        'verified_by',
        'forgine_univ_attath_yn',
        'univ_anushad_no',
        'univ_dept_no',
        'univ_inst_no',
        'univ_branch_no',
        'univ_edu_type',
        'samister_month',
        'samister_day',
        'univ_education_level_id',
        'teiin',
        'govt_primary_status',
        'security_guard_yn',
        'head_status',
        'attach_inst_primary',
        'attach_inst_school',
        'attach_inst_college',
        'attach_inst_madrash',
        'upload_done',
        'bongobundhu',
        'ibtedai_attach_yn',
        'night_guard_yn',
        'establish_date_dakhil',
        'establish_date_alim',
        'establish_date_fazil',
        'establish_date_kamil',
        'technical_branch_type_alim_voc',
        'mojjabid_mahir_group',
        'attached_inst_name',
        'inst_govt_authority',
        'univ_affilate_college_no',
        'type_name',
        'verified_status',
        'institute_type_id',
        'verified_ap',
        'verified_useo',
        'verified_deo',
        'registration_authority',
        'course_curriculam_authority',
        'lowest_class_id',
        'uni_committee_type',
        'uni_member_total',
        'uni_member_female',
        'lowest_edu_level',
        'technical_branch_type_dak_voc',
        'attached_inst_type', //added for new design
        'head_status',
        'MED_ODHIVUKTI'
    ];

//    public function institutes_recognition()
//    {
//        return $this->hasMany(Institutes_recognition::class, 'institute_id');
//    }
//
//    public function institutes_mpo_status()
//    {
//        return $this->hasMany(Institutes_mpo_status::class, 'institute_id');
//    }
//
//    public function committees()
//    {
//        return $this->hasMany(Committees::class, 'institute_id');
//    }
//
//    public function institutes_land_usage()
//    {
//        return $this->hasMany(Institutes_land_usage::class, 'institute_id');
//    }
//
//    public function building_infos()
//    {
//        return $this->hasMany(Building_infos::class, 'institute_id');
//    }
//
//    public function building_numbers()
//    {
//        return $this->hasMany(Building_numbers::class, 'institute_id');
//    }
//
//    public function building_use()
//    {
//        return $this->hasMany(Building_use::class, 'institute_id');
//    }
//
//    public function building_details()
//    {
//        return $this->hasMany(Building_details::class, 'institute_id');
//    }
//
//    public function classwise_room_space()
//    {
//        return $this->hasMany(Classwise_room_space::class, 'institute_id');
//    }

//    public function division()
//    {
//        return $this->hasMany(Divisions::class, 'division_id', 'division_id');
//    }
//
//    public function district()
//    {
//        return $this->hasMany(Districts::class, 'district_id', 'district_id');
//    }
//
//    public function thana()
//    {
//        return $this->hasMany(Thanas::class, 'thana_id', 'thana_id');
//    }
//
//    public function mauza()
//    {
//        return $this->hasMany(Mauzas::class, 'mauza_id', 'mauza_id');
//    }
//
//    public function union()
//    {
//        return $this->hasMany(Unions::class, 'union_id', 'union_id');
//    }

    /*date format*/

    public function getEstablishDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getNationalizationDateAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateCollegeAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateVocAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateBmAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateHscvocAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateDiplomaAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateAgriDiplomaAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateDakhilAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateAlimAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateFazilAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

    public function getEstablishDateKamilAttribute($date)
    {
        if(isset($date)){
            return date("Y-m-d",strtotime($date));
        }else{
            return null;
        }

    }

}
