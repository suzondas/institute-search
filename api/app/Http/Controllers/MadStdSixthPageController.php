<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_prev_year;
use App\Models\Board_exam_result;
use App\Models\Sscvoc_student_summary;
use App\Models\Hscvoc_student_summary;
use App\Models\Hscbm_student_summary;

class MadStdSixthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonMadSixth.php';

        $edu_level_sch_id = [20,21];
        $edu_level_id = [22, 23, 24, 25];
        $edu_level = [20, 21, 22, 23, 24, 25];
        $data->schClasses = [];
        $data->colClasses = [];
        $data->classes = [];

        /*Json Class Data iteration*/
        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_sch_id)) {
                array_push($data->schClasses, $class);
            }
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->colClasses, $class);
            }

            if (in_array($class['education_level_id'], $edu_level)) {
                array_push($data->classes, $class);
            }

        }
        $toInsertArr = [];
        /*Students Summery Prev Yr School*/
        $studentSummeryPrevYrData = Student_summary_prev_year::where(['institute_id' => $inst_id])->get();
        if ($studentSummeryPrevYrData->isEmpty()) {
            $toAddedStudentSumPrYr = [];
            foreach ($data->classes as $class) {
                if(empty($class['groups'])){
                    $toInsertArr['institute_id'] = $inst_id;
                    $toInsertArr['education_level_id'] = $class['education_level_id'];
                    $toInsertArr['class_id'] = $class['class_id'];
                    $toInsertArr['group_id'] = null;
                    array_push($toAddedStudentSumPrYr, $toInsertArr);
                }else{
                    foreach ($class['groups'] as $group) {
                        $toInsertArr = [];
                        $toInsertArr['institute_id'] = $inst_id;
                        $toInsertArr['education_level_id'] = $group['education_level_id'];
                        $toInsertArr['class_id'] = $class['class_id'];
                        $toInsertArr['group_id'] = $group['group_id'];
                        array_push($toAddedStudentSumPrYr, $toInsertArr);
                    }
                }

            }
            try {
                Student_summary_prev_year::insert($toAddedStudentSumPrYr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Student Summery Prev Yr Table');
            }
            /*Now Return ALl Student Summery Prev Yr rows*/
            $studentSummeryPrevYrData = Student_summary_prev_year::where(['institute_id' => $inst_id])->get();
        }
        $data->studentSummeryPrevYr = $studentSummeryPrevYrData;
        /*Students Summery Prev Yr School Ends*/

        /*Group wise Board Result*/
        $data->examLevel = $examLevel;
        $boardWiseExamResults = Board_exam_result::where(['institute_id' => $inst_id])->get();
        if ($boardWiseExamResults->isEmpty()) {
            $toAddedBoardExamResults = [];
            foreach ($examList as $exam) {
                $toInsertArrEx = [];
                $toInsertArrEx['institute_id'] = $inst_id;
                $toInsertArrEx['exam_id'] = $exam['exam_id'];
                $toInsertArrEx['subject'] = $exam['subject'];
                array_push($toAddedBoardExamResults, $toInsertArrEx);
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

        /*SSCVOC Students*/
        //$sscTradeList = Lookup_ssc_voc::where(['cur_id' => 27])->get(); //load data from json
        //$data->ssctrad=$sscTradeList;
        $sscVocStd = Sscvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('trade_code')->get();
        if ($sscVocStd->isEmpty()) {
            $toAddedSscVoc = [];
            foreach ($sscTradeList as $trade) {
                $toInsertArrSt = [];
                $toInsertArrSt['institute_id'] = $inst_id;
                $toInsertArrSt['cur_id'] = $trade['cur_id'];
                $toInsertArrSt['trade_code'] = $trade['trade_code'];
                $toInsertArrSt['trade_name'] = $trade['trade_name'];
                array_push($toAddedSscVoc, $toInsertArrSt);
            }
            try {
                Sscvoc_student_summary::insert($toAddedSscVoc);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save SSCVOC Table');
            }
            /*Now Return HSCVOC rows*/
            $sscVocStd = Sscvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('trade_code')->get();
        }
        $data->sscVocStd = $sscVocStd;
        /*SSCVOC Students*/

        /*HSCVOC Students*/
        //$hscTradeList = Lookup_ssc_voc::where(['cur_id' => 26])->get(); //load data from json
        //$data->hsctrad=$hscTradeList;
        $hscVocStd = Hscvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('trade_code')->get();
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
            $hscVocStd = Hscvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('trade_code')->get();
        }
        $data->hscVocStd = $hscVocStd;
        /*HSCVOC Students*/
        /*HSCBM Students*/
        //$hscBmList = Lookup_hsc_bm_basic::where(['cur_id' => 24])->get(); //load data from json
        $hscBMStd = Hscbm_student_summary::where(['institute_id' => $inst_id])->orderBy('trade_code')->get();
        if ($hscBMStd->isEmpty()) {
            $toAddedHscBm = [];
            foreach ($hscBmList as $trade) {
                $toInsertArrBm = [];
                $toInsertArrBm['institute_id'] = $inst_id;
                $toInsertArrBm['cur_id'] = $trade['cur_id'];
                $toInsertArrBm['trade_code'] = $trade['trade_code'];
                $toInsertArrBm['trade_name'] = $trade['trade_name'];
                array_push($toAddedHscBm, $toInsertArrBm);
            }
            try {
                Hscbm_student_summary::insert($toAddedHscBm);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSCBM Table');
            }
            /*Now Return Hscbm_student_summary rows*/
            $hscBMStd = Hscbm_student_summary::where(['institute_id' => $inst_id])->orderBy('trade_code')->get();
        }
        $data->hscBMStd = $hscBMStd;
        /*HSCBM Students*/

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
        $studentSummeryPrevYr = $data["studentSummeryPrevYr"];
        $boardWiseExamResults = $data["boardWiseExamResults"];
        $sscVocStd = $data["sscVocStd"];
        $hscVocStd = $data["hscVocStd"];
        $hscBMStd = $data["hscBMStd"];
        /*==================Parsing Table wise data from Array End=======*/

        /*saving data of Student_summary_prev_year */
        try {
            Student_summary_prev_year::where('institute_id', $instId)->delete();
            Student_summary_prev_year::insert($studentSummeryPrevYr);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Board_exam_result */

        try {
            Board_exam_result::where('institute_id', $instId)->delete();
            Board_exam_result::insert($boardWiseExamResults);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Sscvoc_student_summary */

        try {
            Sscvoc_student_summary::where('institute_id', $instId)->delete();
            Sscvoc_student_summary::insert($sscVocStd);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Hscvoc_student_summary */
        try {
            Hscvoc_student_summary::where('institute_id', $instId)->delete();
            Hscvoc_student_summary::insert($hscVocStd);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Hscbm_student_summary */
        try {
            Hscbm_student_summary::where('institute_id', $instId)->delete();
            Hscbm_student_summary::insert($hscBMStd);
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
