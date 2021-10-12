<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board_exam_result;
use App\Models\Lookup_exam_name;
use App\Models\Lookup_ssc_voc;
use App\Models\Hscvoc_student_summary;
use App\Models\Lookup_hsc_bm_basic;
use App\Models\Hscbm_student_summary;
use App\Models\Institutes_other_info;
use App\Models\Students_open_university;
use App\Models\Result_open_university;


class CollegeFourthPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonCollegeFourth.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_id = [31, 32, 33, 34];
        $data->classes = [];
        /*Json Class Data iteration*/
        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->classes, $class);
            }
        }

        /*Group wise Board Result*/
        $data->examLevel = $examLevel;
        $boardWiseExamResults = Board_exam_result::where(['institute_id' => $inst_id])->get();
        if ($boardWiseExamResults->isEmpty()) {
            $toAddedBoardExamResults = [];
            foreach ($examList as $exam) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['exam_id'] = $exam['exam_id'];
                $toInsertArr['subject'] = $exam['subject'];
                array_push($toAddedBoardExamResults, $toInsertArr);
            }
            Board_exam_result::insert($toAddedBoardExamResults);
            try {
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Board Wise Result Table');
            }
            /*Now Return ALl Student Board_exam_result rows*/
            $boardWiseExamResults = Board_exam_result::where(['institute_id' => $inst_id])->get();
        }
        $data->boardWiseExamResults = $boardWiseExamResults;
        /*Group wise Board Result*/

        /*HSCVOC Students*/
        //$hscTradeList = Lookup_ssc_voc::where(['cur_id' => 26])->get(); //load data from json
        //$data->hsctrad=$hscTradeList;
        $hscVocStd = Hscvoc_student_summary::where(['institute_id' => $inst_id])->get();
        if ($hscVocStd->isEmpty()) {
            $toAddedHscVoc = [];
            foreach ($hscTradeList as $trade) {
                $toInsertArrHv = [];
                $toInsertArrHv['institute_id'] = $inst_id;
                $toInsertArrHv['cur_id'] = $trade['cur_id'];
                $toInsertArrHv['trade_code'] = $trade['trade_code'];
                $toInsertArrHv['trade_name'] = $trade['trade_name'];
                array_push($toAddedHscVoc, $toInsertArrHv);
            }
            try {
                Hscvoc_student_summary::insert($toAddedHscVoc);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSCVOC Table');
            }
            /*Now Return HSCVOC rows*/
            $hscVocStd = Hscvoc_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->hscVocStd = $hscVocStd;
        /*HSCVOC Students*/

        /*HSCBM Students*/
        //$hscBmList = Lookup_hsc_bm_basic::where(['cur_id' => 24])->get(); //load data from json
        $hscBMStd = Hscbm_student_summary::where(['institute_id' => $inst_id])->get();
        if ($hscBMStd->isEmpty()) {
            $toAddedHscBm = [];
            foreach ($hscBmList as $trade) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['cur_id'] = $trade['cur_id'];
                $toInsertArr['trade_code'] = $trade['trade_code'];
                $toInsertArr['trade_name'] = $trade['trade_name'];
                array_push($toAddedHscBm, $toInsertArr);
            }
            try {
                Hscbm_student_summary::insert($toAddedHscBm);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSCBM Table');
            }
            /*Now Return Hscbm_student_summary rows*/
            $hscBMStd = Hscbm_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->hscBMStd = $hscBMStd;
        /*HSCBM Students*/

        /*Instittute Other Infos for open university programm yes/no */
        $instOtherInfo = Institutes_other_info::where(['institute_id' => $inst_id])->first();
        if(empty($instOtherInfo)){
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
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['admit_year'] = $yr['admit_year'];
                array_push($toAddedOpenUnSTD, $toInsertArr);
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
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['year'] = $yr['admit_year'];
                array_push($toAddedOpenUnRes, $toInsertArr);
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


    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array

        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $boardWiseExamResults = $data["boardWiseExamResults"];
        $hscVocStd = $data["hscVocStd"];
        $hscBMStd = $data["hscBMStd"];
        $instOtherInfo = $data["instOtherInfo"];
        $openUnStd = $data["openUnStd"];
        $openUnRes = $data["openUnRes"];
        /*==================Parsing Table wise data from Array End=======*/

        /* saving board wise exam result */
        try {
            Board_exam_result::where('institute_id', $instId)->delete();
            Board_exam_result::insert($boardWiseExamResults);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /* saving hsc voc student summary */
        try {
            Hscvoc_student_summary::where('institute_id', $instId)->delete();
            Hscvoc_student_summary::insert($hscVocStd);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /* saving hsc BM student summary */
        try {
            Hscbm_student_summary::where('institute_id', $instId)->delete();
            Hscbm_student_summary::insert($hscBMStd);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*updating Institutes Other Info table data*/
        try {
            Institutes_other_info::where('id', $instOtherInfo["id"])->update($instOtherInfo);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Open University students data */
        try {
            Students_open_university::where('institute_id', $instId)->delete();
            Students_open_university::insert($openUnStd);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /* saving Open University result */
        try {
            Result_open_university::where('institute_id', $instId)->delete();
            Result_open_university::insert($openUnRes);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        return response($err);
    }


}
