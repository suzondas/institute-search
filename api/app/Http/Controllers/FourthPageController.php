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

    public function store(Request $request)
    {

        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $Summary_infos = $data["summary_infos"];
        $summary_audit_infos = $data["summary_audit_infos"];
        $community_services = $data["community_services"];
        /*saving summary info  data */
        try {
            Summary_infos::where('institute_id', $instId)->update($Summary_infos);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }
        /*saving summary audit info  data */
        try {
            Summary_audit_infos::where('institute_id', $instId)->update($summary_audit_infos);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }
        /*saving community service  data */
        try {
            Community_services::where('institute_id', $instId)->update($community_services);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }
}
