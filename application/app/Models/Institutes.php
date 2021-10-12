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
        'INSTITUTE_ID',
        'EIIN',
        'LATITUDE',
        'LONGITUDE',
        'INSTITUTE_NAME_NEW',
        'INSTITUTE_NAME_BANGLA',
        'LOCATION',
        'POST_OFFICE',
        'POST_CODE',
        'UNION_ID',
        'MAUZA_ID',
        'THANA_ID',
        'DISTRICT_ID',
        'DIVISION_ID',
        'MOBPHONE',
        'TELEPHONE',
        'MOBPHONE_ALTERNATE',
        'E_MAIL',
        'WEB_SITE',
        'EC_NATIONAL_CODE',
        'EC_DISTRICT_CODE',
        'EDUCATION_LEVEL_ID',
        'ARTS_GROUP',
        'SCIENCE_GROUP',
        'COMMERCE_GROUP',
        'ARTS_GROUP_COL',
        'SCIENCE_GROUP_COL',
        'COMMERCE_GROUP_COL',
        'SOCIAL_SCIENCE_GROUP',
        'ISLAMIC_STADIES_GROUP',
        'MUSIC_GROUP',
        'HOME_ECONOMIC_GROUP',
        'OTHER_GROUP',
        'TECHNICAL_BRANCH_TYPE_AGRO',
        'TECHNICAL_BRANCH_TYPE_FISH',
        'TECHNICAL_BRANCH_TYPE',
        'TECHNICAL_BRANCH_TYPE_BM',
        'TECHNICAL_BRANCH_TYPE_HSCVOC',
        'ESTABLISH_DATE',
        'ENGLISH_VER_YN',
        'MANAGEMENT',
        'NATIONALIZATION_DATE',
        'FOR_WHOM',
        'GEOGRAPHICAL_STATUS',
        'AREA_STATUS1',
        'ADMIN_UNIT_COMMUNICATION',
        'NEAREST_ADMIN_UNIT_DISTANT',
        'NEAREST_INST_DISTANT',
        'BRANCH_YN',
        'BRANCH_NO',
        'CAMPUS_YN',
        'ATTACH_INST_YN',
        'MPO_STATUS',
        'TECHNICAL_BRANCH_MPO_STATUS',
        'YEAR',
        'DOUBLE_SHIPT_YN',
        'INSTITUTE_CODE',
        'SHIFT_NO',
        'RECOGNITION',
        'NATIONAL_UNIVERSITY_CODE',
        'SCHOOL_CODE',
        'COLLEGE_CODE',
        'UNIVERSITY_CODE',
        'TECHNICAL_CODE',
        'MPO_CODE_SCHOOL',
        'MPO_CODE_COLLEGE',
        'MPO_CODE_TECHNICAL',
        'MPO_CODE_MADRASAH',
        'HIFJUL_GROUP',
        'MOJJABID_GROUP',
        'ARTS_COLLEGE',
        'SCIENCE_COLLEGE',
        'COMMERCE_COLLEGE',
        'BOARD_CODE',
        'TECHNICAL_BRANCH_BOTH',
        'MPO_CODE_BM',
        'ESTABLISH_DATE_VOC',
        'ESTABLISH_DATE_BM',
        'RECOGNITION_COL',
        'ESTABLISH_DATE_COLLEGE',
        'CONSTITUENCY',
        'CONSTITUTE_NO',
        'ESTABLISH_DATE_HSCVOC',
        'ESTABLISH_DATE_DIPLOMA',
        'ESTABLISH_DATE_AGRI_DIPLOMA',
        'VERIFIED_BY',
        'FORGINE_UNIV_ATTATH_YN',
        'UNIV_ANUSHAD_NO',
        'UNIV_DEPT_NO',
        'UNIV_INST_NO',
        'UNIV_BRANCH_NO',
        'UNIV_EDU_TYPE',
        'SAMISTER_MONTH',
        'SAMISTER_DAY',
        'UNIV_EDUCATION_LEVEL_ID',
        'TEIIN',
        'GOVT_PRIMARY_STATUS',
        'SECURITY_GUARD_YN',
        'HEAD_STATUS',
        'ATTACH_INST_PRIMARY',
        'ATTACH_INST_SCHOOL',
        'ATTACH_INST_COLLEGE',
        'ATTACH_INST_MADRASH',
        'UPLOAD_DONE',
        'BONGOBUNDHU',
        'IBTEDAI_ATTACH_YN',
        'NIGHT_GUARD_YN',
        'ESTABLISH_DATE_DAKHIL',
        'ESTABLISH_DATE_ALIM',
        'ESTABLISH_DATE_FAZIL',
        'ESTABLISH_DATE_KAMIL',
        'TECHNICAL_BRANCH_TYPE_ALIM_VOC',
        'MOJJABID_MAHIR_GROUP',
        'ATTACHED_INST_NAME',
        'INST_GOVT_AUTHORITY',
        'UNIV_AFFILATE_COLLEGE_NO',
        'TYPE_NAME',
        'VERIFIED_STATUS',
        'INSTITUTE_TYPE_ID',
        'VERIFIED_AP',
        'VERIFIED_USEO',
        'VERIFIED_DEO',
        'REGISTRATION_AUTHORITY',
        'COURSE_CURRICULAM_AUTHORITY',
        'LOWEST_CLASS_ID'
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
