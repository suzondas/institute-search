<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_prev_year;
use App\Models\Board_exam_result;
use App\Models\Sscvoc_student_summary;
use App\Models\Institutes_other_info;
use App\Models\Students_open_university;
use App\Models\Result_open_university;

class SchoolFourthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonSchoolFourth.php';

        $edu_level_id = [11, 12, 13];
        $data->classes = [];

        /*Json Class Data iteration*/
        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->classes, $class);
            }
        }
        $toInsertArr = [];
        /*Students Summery Prev Yr School*/
        $studentSummeryPrevYrData = Student_summary_prev_year::wherein('education_level_id', array(11, 12, 13))->where(['institute_id' => $inst_id])->get();
        if ($studentSummeryPrevYrData->isEmpty()) {
            $toAddedStudentSumPrYr = [];
            foreach ($data->classes as $class) {
                if (empty($class['groups'])) {
                    $toInsertArr['institute_id'] = $inst_id;
                    $toInsertArr['education_level_id'] = $class['education_level_id'];
                    $toInsertArr['class_id'] = $class['class_id'];
                    $toInsertArr['group_id'] = null;
                    array_push($toAddedStudentSumPrYr, $toInsertArr);
                } else {
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
            $studentSummeryPrevYrData = Student_summary_prev_year::wherein('education_level_id', array(11, 12, 13))->where(['institute_id' => $inst_id])->get();
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

        $sscVocStd = Sscvoc_student_summary::where(['institute_id' => $inst_id])->get();
        if ($sscVocStd->isEmpty()) {
            $toAddedSscVoc = [];
            foreach ($sscTradeList as $trade) {
                $toInsertArrSv = [];
                $toInsertArrSv['institute_id'] = $inst_id;
                $toInsertArrSv['cur_id'] = $trade['cur_id'];
                $toInsertArrSv['trade_code'] = $trade['trade_code'];
                $toInsertArrSv['trade_name'] = $trade['trade_name'];
                array_push($toAddedSscVoc, $toInsertArrSv);
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
        //return response()->json($sscVocStd);
        /*Instittute Other Infos for open university programm yes/no */
        $instOtherInfo = Institutes_other_info::where(['institute_id' => $inst_id])->first();
        if (empty($instOtherInfo)) {
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

    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $studentSummeryPrevYr = $data["studentSummeryPrevYr"];
        $boardWiseExamResults = $data["boardWiseExamResults"];
        $sscVocStd = $data["sscVocStd"];
        $instOtherInfo = $data["instOtherInfo"];
        $openUnStd = $data["openUnStd"];
        $openUnRes = $data["openUnRes"];
        /*==================Parsing Table wise data from Array End=======*/

        /*saving data of Student_summary_prev_year School */
        try {
            Student_summary_prev_year::wherein('education_level_id', array(11, 12, 13))->where('institute_id', $instId)->delete();
            Student_summary_prev_year::insert($studentSummeryPrevYr);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /* saving Board_exam_result */

        try {
            Board_exam_result::where('institute_id', $instId)->delete();
            Board_exam_result::insert($boardWiseExamResults);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /* saving Sscvoc_student_summary */

        try {
            Sscvoc_student_summary::where('institute_id', $instId)->delete();
            Sscvoc_student_summary::insert($sscVocStd);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /*saving data of Institutes_other_info */
        try {
            Institutes_other_info::where('id', $instOtherInfo["id"])->update($instOtherInfo);

        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /* saving Students_open_university */

        try {
            Students_open_university::where('institute_id', $instId)->delete();
            Students_open_university::insert($openUnStd);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /* saving Result_open_university */

        try {
            Result_open_university::where('institute_id', $instId)->delete();
            Result_open_university::insert($openUnRes);
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
