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

    public function store(Request $request)
    {
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $multimedia_infos = $data["multimedia_infos"];
        $institutes_facilities_others = $data["institutes_facilities_others"];
        $institutes_libraries = $data["institutes_libraries"];
        $community_service = $data["community_service"];
        $summary_infos = $data["summary_infos"];
        $summary_audit_infos = $data["summary_audit_infos"];
        $instituteSpecialStudents = $data["instituteSpecialStudents"];
        $medHealthFac = $data["medHealthFac"];
        $medTransFac = $data["medTransFac"];
        $covid_infos=$data["covid_infos"];


        /*saving multimedia info data */
        try {
            Multimedia_infos::where('institute_id', $instId)->update(
                ['multimedia_projector_yn'=>$multimedia_infos['multimedia_projector_yn']
                    ]
                );
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /*saving multimedia info data */
        /*saving institutes other facility data */
        try {
            Institutes_facilities_others::where('institute_id', $instId)->update([
                'lift_yn'=>$institutes_facilities_others['lift_yn'],
                'lift_number'=>$institutes_facilities_others['lift_number'],
                'equipment_room_yn'=>$institutes_facilities_others['equipment_room_yn'],
                'autistic_seperate_toilet'=>$institutes_facilities_others['autistic_seperate_toilet']
            ]);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /*saving institutes library data */
        try {
            Institutes_libraries::where('institute_id', $instId)->update($institutes_libraries);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /*saving community_service data*/
        try{
            Community_services::where('institute_id',$instId)->update($community_service);
        } catch(\Esception $e){
            array_push($err, $e);
        }

        /*saving summary_infos data*/
        try{
            Summary_infos::where('institute_id',$instId)->update($summary_infos);
        } catch (\Exception $e)
        {
            array_push($err, $e);
        }

        /*-----------------------------------*/

        /*saving summary_audit_infos data*/
        try{
            Summary_audit_infos::where('institute_id',$instId)->update($summary_audit_infos);
        } catch(\Exception $e){
            array_push($err, $e);
        }
        /*saving instituteSpecialStudents*/
        try{
            Institutes_special_student::where('institute_id',$instId)->update($instituteSpecialStudents);
        } catch(\Exception $e){
            array_push($err, $e);
        }
        /*saving medHealthFac*/
        try{
            Medical_health_facility::where('institute_id',$instId)->update($medHealthFac);
        } catch(\Exception $e){
            array_push($err, $e);
        }

        /*saving medTransFac*/
        try{
            Medical_transport_facility::where('institute_id',$instId)->update($medTransFac);
        } catch(\Exception $e){
            array_push($err, $e);
        }

        /* saving covid data*/
        try {
            Covid_infos::where('institute_id', $instId)->update($covid_infos);

        } catch (\Exception $e) {
            array_push($err, $e);
        }


        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }
}
