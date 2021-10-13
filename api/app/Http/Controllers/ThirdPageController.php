<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes_computer_lab_infos;
use App\Models\Multimedia_infos;
use App\Models\Institutes_ict_infos;
use App\Models\Institutes_facilities_others;
use App\Models\Institutes_libraries;


class ThirdPageController extends Controller
{
    public function index($inst_id){
        $data = new \stdClass();
        $toInsertArr['institute_id'] = $inst_id;
        /*Institutes_computer_lab_infos*/
        $institutes_computer_lab_infos = Institutes_computer_lab_infos::where(['institute_id'=>$inst_id])->first();
        if($institutes_computer_lab_infos === null){
            Institutes_computer_lab_infos::insert($toInsertArr);
            $institutes_computer_lab_infos = Institutes_computer_lab_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_computer_lab_infos=$institutes_computer_lab_infos;
        /*Institutes_computer_lab_infos*/

        /*Multimedia_infos*/
        $multimedia_infos = Multimedia_infos::where(['institute_id'=>$inst_id])->first();
        if($multimedia_infos === null){
            Multimedia_infos::insert($toInsertArr);
            $multimedia_infos = Multimedia_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->multimedia_infos=$multimedia_infos;
        /*Multimedia_infos*/

        /*Institutes_ict_infos*/
        $institutes_ict_infos = Institutes_ict_infos::where(['institute_id'=>$inst_id])->first();
        if($institutes_ict_infos === null){
            Institutes_ict_infos::insert($toInsertArr);
            $institutes_ict_infos = Institutes_ict_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_ict_infos=$institutes_ict_infos;
        /*Institutes_ict_infos*/

        /*Institutes_facilities_others*/
        $institutes_facilities_others = Institutes_facilities_others::where(['institute_id'=>$inst_id])->first();
        if($institutes_facilities_others === null){
            Institutes_facilities_others::insert($toInsertArr);
            $institutes_facilities_others = Institutes_facilities_others::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_facilities_others=$institutes_facilities_others;
        /*Institutes_facilities_others*/

        /*Institutes_libraries*/
        $institutes_libraries = Institutes_libraries::where(['institute_id'=>$inst_id])->first();
        if($institutes_libraries === null){
            Institutes_libraries::insert($toInsertArr);
            $institutes_libraries = Institutes_libraries::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_libraries=$institutes_libraries;
        /*Institutes_libraries*/
        return response()->json($data);
    }
}
