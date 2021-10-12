<?php

namespace App\Http\Controllers;

use App\Models\Prof_certificate_result;
use App\Models\Prof_result;
use Illuminate\Http\Request;
use App\Models\Institutes_other_info;
use App\Models\Students_open_university;
use App\Models\Result_open_university;


class ProfStdThirdPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonProfThird.php';
        /*result summary*/
        $profRes = Prof_result::where(['institute_id' => $inst_id])->first();
        if (empty($profRes)) {
            $toInsertArr['institute_id'] = $inst_id;
            Prof_result::insert($toInsertArr);
            $profRes = Prof_result::where(['institute_id' => $inst_id])->first();
        }
        $data->profRes = $profRes;
        /*result summary*/

        /*Certificate course result*/
        $certficateRes = Prof_certificate_result::where(['institute_id' => $inst_id])->first();
        if (empty($certficateRes)) {
            $toInsertArr['institute_id'] = $inst_id;
            Prof_certificate_result::insert($toInsertArr);
            $certficateRes = Prof_certificate_result::where(['institute_id' => $inst_id])->first();
        }
        $data->certficateRes = $certficateRes;
        /*Certificate course result*/

        /*Instittute Other Infos for open university programm yes/no */
        $instOtherInfo = Institutes_other_info::where(['institute_id' => $inst_id])->first();
        if (empty($instOtherInfo)) {
            $toInsertArr['institute_id'] = $inst_id;
            Institutes_other_info::insert($toInsertArr);
            $instOtherInfo = Institutes_other_info::where(['institute_id' => $inst_id])->first();
        }
        $data->instOtherInfo = $instOtherInfo;
        /*Instittute Other Infos*/

        /*Students_open_university*/
        $openUnStd = Students_open_university::where(['institute_id' => $inst_id])->get();
        if ($openUnStd->isEmpty()) {
            $toAddedOpenUnSTD = [];
            foreach ($admitYrList as $yr) {
                $toInsertArrOps = [];
                $toInsertArrOps['institute_id'] = $inst_id;
                $toInsertArrOps['admit_year'] = $yr['admit_year'];
                array_push($toAddedOpenUnSTD, $toInsertArrOps);
            }
            try {
                Students_open_university::insert($toAddedOpenUnSTD);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save open university student Table');
            }
            /*Now Return Students_open_university rows*/
            $openUnStd = Students_open_university::where(['institute_id' => $inst_id])->get();
        }
        $data->openUnStd = $openUnStd;
        /*Students_open_university*/
        /*Result_open_university*/
        $openUnRes = Result_open_university::where(['institute_id' => $inst_id])->get();
        if ($openUnRes->isEmpty()) {
            $toAddedOpenUnRes = [];
            foreach ($resYrList as $yr) {
                $toInsertArrOpr = [];
                $toInsertArrOpr['institute_id'] = $inst_id;
                $toInsertArrOpr['year'] = $yr['admit_year'];
                array_push($toAddedOpenUnRes, $toInsertArrOpr);
            }
            try {
                Result_open_university::insert($toAddedOpenUnRes);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save result open university Table');
            }
            /*Now Return Result_open_university rows*/
            $openUnRes = Result_open_university::where(['institute_id' => $inst_id])->get();
        }
        $data->openUnRes = $openUnRes;
        /*Result_open_university*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $profRes = $data["profRes"];
        $certficateRes = $data["certficateRes"];
        $instOtherInfo = $data["instOtherInfo"];
        $openUnStd = $data["openUnStd"];
        $openUnRes = $data["openUnRes"];

        /*==================Parsing Table wise data from Array End=======*/

        /*saving data of Professional_result */
        try {
            Prof_result::where('institute_id', $instId)->delete();
            Prof_result::insert($profRes);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Professional_certificate_result */

        try {
            Prof_certificate_result::where('institute_id', $instId)->delete();
            Prof_certificate_result::insert($certficateRes);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data of Institutes_other_info */
        try {
            Institutes_other_info::where('id', $instOtherInfo["id"])->update($instOtherInfo);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Students_open_university */

        try {
            Students_open_university::where('institute_id', $instId)->delete();
            Students_open_university::insert($openUnStd);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Result_open_university */

        try {
            Result_open_university::where('institute_id', $instId)->delete();
            Result_open_university::insert($openUnRes);
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
