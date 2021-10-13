<?php

namespace App\Http\Controllers;

use App\Models\Medical_health_facility;
use App\Models\Medical_transport_facility;
use Illuminate\Http\Request;
use App\Models\Multimedia_infos;
use App\Models\Institutes_facilities_others;
use App\Models\Institutes_libraries;
use App\Models\Summary_infos;
use App\Models\Summary_audit_infos;
use App\Models\Institutes_special_student;
use App\Models\Community_services;
use App\Models\Covid_infos;

class MedicalBibidhoController extends Controller
{
    public function index($inst_id)
    {
        $data = new \stdClass();
        $toInsertArr['institute_id'] = $inst_id;
        /*Multimedia_infos*/
        $multimedia_infos = Multimedia_infos::where(['institute_id' => $inst_id])->first([
            'id',
            'institute_id',
            'multimedia_projector_yn'
        ]);
        if ($multimedia_infos === null) {
            Multimedia_infos::insert($toInsertArr);
            $multimedia_infos = Multimedia_infos::where(['institute_id' => $inst_id])->first([
                'id',
                'institute_id',
                'multimedia_projector_yn'
            ]);
        }
        $data->multimedia_infos = $multimedia_infos;
        /*Multimedia_infos*/

        /*Community Services*/
        $community_services = Community_services::where(['institute_id' => $inst_id])->first();
        if($community_services===null){
            Community_services::insert($toInsertArr);
            $community_services = Community_services::where(['institute_id' => $inst_id])->first();
        }
        $data->community_service=$community_services;


        /*Institutes_facilities_others*/
        $institutes_facilities_others = Institutes_facilities_others::where(['institute_id' => $inst_id])->first([
            'id',
            'institute_id',
            'lift_yn',
            'lift_number',
            'equipment_room_yn',
            'autistic_seperate_toilet'
        ]);
        if ($institutes_facilities_others === null) {
            Institutes_facilities_others::insert($toInsertArr);
            $institutes_facilities_others = Institutes_facilities_others::where(['institute_id' => $inst_id])->first([
                'id',
                'institute_id',
                'lift_yn',
                'lift_number',
                'equipment_room_yn',
                'autistic_seperate_toilet'
            ]);        }
        $data->institutes_facilities_others = $institutes_facilities_others;
        /*Institutes_facilities_others*/

        /*Institutes_libraries*/
        $institutes_libraries = Institutes_libraries::where(['institute_id' => $inst_id])->first();
        if ($institutes_libraries === null) {
            Institutes_libraries::insert($toInsertArr);
            $institutes_libraries = Institutes_libraries::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_libraries = $institutes_libraries;
        /*Institutes_libraries*/
        /*Summary_infos*/
        $data->summary_infos = Summary_infos::where(['institute_id' => $inst_id])->first();
        if ($data->summary_infos === null) {
            Summary_infos::insert($toInsertArr);
            $data->summary_infos = Summary_infos::where(['institute_id' => $inst_id])->first();
        }
        /*Summary_infos*/

        /*Summary_audit_infos*/
        $data->summary_audit_infos = Summary_audit_infos::where(['institute_id' => $inst_id])->first();
        if ($data->summary_audit_infos === null) {
            Summary_audit_infos::insert($toInsertArr);
            $data->summary_audit_infos = Summary_audit_infos::where(['institute_id' => $inst_id])->first();
        }
        /*Summary_audit_infos*/

        /*Inst Special Need*/
        $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        if(empty($instSpecialInfo)){
            $toInsertArr['institute_id'] = $inst_id;
            Institutes_special_student::insert($toInsertArr);
            $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        }
        $data->instituteSpecialStudents = $instSpecialInfo;
        /*Institutes_special_student*/

        $medHealthFac=Medical_health_facility::where(['institute_id'=>$inst_id])->first();
        if($medHealthFac===null){
            $toInsertArr['institute_id'] = $inst_id;
            Medical_health_facility::insert($toInsertArr);
            $medHealthFac=Medical_health_facility::where(['institute_id'=>$inst_id])->first();
        }
        $data->medHealthFac=$medHealthFac;

        $medTransFac=Medical_transport_facility::where(['institute_id'=>$inst_id])->first();
        if($medTransFac===null){
            $toInsertArr['institute_id'] = $inst_id;
            Medical_transport_facility::insert($toInsertArr);
            $medTransFac=Medical_transport_facility::where(['institute_id'=>$inst_id])->first();
        }
        $data->medTransFac=$medTransFac;
        /*Covid_infos*/
        $covid_infos = Covid_infos::where(['institute_id'=>$inst_id])->first();
        if(empty($covid_infos)){
            $toInsertArr['institute_id'] = $inst_id;
            Covid_infos::insert($toInsertArr);
            $covid_infos = Covid_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->covid_infos=$covid_infos;

        return response()->json($data);
    }


}
