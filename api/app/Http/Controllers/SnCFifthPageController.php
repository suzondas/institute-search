<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_prev_year;
use App\Models\Board_exam_result;
use App\Models\Sscvoc_student_summary;
use App\Models\Hscvoc_student_summary;
use App\Models\Hscbm_student_summary;
use App\Models\Institutes_other_info;
use App\Models\Students_open_university;
use App\Models\Result_open_university;

class SnCFifthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonSnCFifth.php';

        $edu_level_sch_id = [11,12, 13];
        $edu_level_id = [31, 32, 33, 34];
        $edu_level = [11, 12, 13, 31, 32, 33, 34];
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

        /*Students Summery Prev Yr School*/
        $studentSummeryPrevYrData = Student_summary_prev_year::wherein('education_level_id', array(11,12,13))->where(['institute_id' => $inst_id])->get();
        if ($studentSummeryPrevYrData->isEmpty()) {
            $toAddedStudentSumPrYr = [];
            $toInsertArr = [];
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
            $studentSummeryPrevYrData = Student_summary_prev_year::wherein('education_level_id', array(11,12,13))->where(['institute_id' => $inst_id])->get();
        }
        $data->studentSummeryPrevYr = $studentSummeryPrevYrData;
        /*Students Summery Prev Yr School Ends*/

        /*Students Summery Prev Yr Col*/
        $studentSummeryPrevYrColData = Student_summary_prev_year::wherein('education_level_id', array(31,32,33,34))->where(['institute_id' => $inst_id])->get();
        if ($studentSummeryPrevYrColData->isEmpty()) {
            $toInsertArrPrC = [];
            $toAddedStudentSumPrYr = [];
            foreach ($data->classes as $class) {
                if(empty($class['groups'])){
                    $toInsertArrPrC['institute_id'] = $inst_id;
                    $toInsertArrPrC['education_level_id'] = $class['education_level_id'];
                    $toInsertArrPrC['class_id'] = $class['class_id'];
                    $toInsertArrPrC['group_id'] = null;
                    array_push($toAddedStudentSumPrYr, $toInsertArrPrC);
                }else{
                    foreach ($class['groups'] as $group) {
                        $toInsertArrPrC = [];
                        $toInsertArrPrC['institute_id'] = $inst_id;
                        $toInsertArrPrC['education_level_id'] = $group['education_level_id'];
                        $toInsertArrPrC['class_id'] = $class['class_id'];
                        $toInsertArrPrC['group_id'] = $group['group_id'];
                        array_push($toAddedStudentSumPrYr, $toInsertArrPrC);
                    }
                }

            }
            try {
                Student_summary_prev_year::insert($toAddedStudentSumPrYr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Student Summery Prev Yr Table');
            }
            /*Now Return ALl Student Summery Prev Yr rows*/
            $studentSummeryPrevYrColData = Student_summary_prev_year::wherein('education_level_id', array(31,32,33,34))->where(['institute_id' => $inst_id])->get();
        }
        $data->studentSummeryColPrevYr = $studentSummeryPrevYrColData;
        /*Students Summery Prev Yr Col Ends*/

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
        $sscVocStd = Sscvoc_student_summary::where(['institute_id' => $inst_id])->get();
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
            $sscVocStd = Sscvoc_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->sscVocStd = $sscVocStd;
        /*SSCVOC Students*/

        /*HSCVOC Students*/
        //$hscTradeList = Lookup_ssc_voc::where(['cur_id' => 26])->get(); //load data from json
        //$data->hsctrad=$hscTradeList;
        $hscVocStd = Hscvoc_student_summary::where(['institute_id' => $inst_id])->get();
        if ($hscVocStd->isEmpty()) {
            $toAddedHscVoc = [];
            foreach ($hscTradeList as $trade) {
                $toInsertArrHt = [];
                $toInsertArrHt['institute_id'] = $inst_id;
                $toInsertArrHt['cur_id'] = $trade['cur_id'];
                $toInsertArrHt['trade_code'] = $trade['trade_code'];
                $toInsertArrHt['trade_name'] = $trade['trade_name'];
                array_push($toAddedHscVoc, $toInsertArrHt);
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
            $hscBMStd = Hscbm_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->hscBMStd = $hscBMStd;
        /*HSCBM Students*/

        /*Instittute Other Infos for open university programm yes/no */
        $instOtherInfo = Institutes_other_info::where(['institute_id' => $inst_id])->first();
        if(empty($instOtherInfo)){
            $toInsertArrOf['institute_id'] = $inst_id;
            Institutes_other_info::insert($toInsertArrOf);
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
}
