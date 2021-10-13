<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summary_infos;
use App\Models\Summary_audit_infos;
use App\Models\Community_services;

class FourthPageController extends Controller
{
    public function index($inst_id)
    {
        $data = new \stdClass();
        $toInsertArr['institute_id'] = $inst_id;

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

        /*Community_services*/
        $data->community_services = Community_services::where(['institute_id' => $inst_id])->first();
        if ($data->community_services === null) {
            Community_services::insert($toInsertArr);
            $data->community_services = Community_services::where(['institute_id' => $inst_id])->first();
        }
        /*Community_services*/

        return response()->json($data);
    }


}
