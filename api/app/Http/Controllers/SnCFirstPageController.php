<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_total;
use App\Models\Students_summary;
use App\Models\Student_summary_repeater;
use App\Models\Student_summary_dropout;

use App\Models\Submission_infos;
class SnCFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonSnCFirst.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_sch_id = [11,12, 13];
        $edu_level_id = [31, 32, 33, 34];
        $edu_level = [11, 12, 13, 31, 32, 33, 34];
        $data->schClasses = [];
        $data->colClasses = [];
        $data->classes = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();

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

        /*Education Level Wise Classes with Groups Fetching Ends*/
        //return response()->json($data);
        /*Students Summery Secondary Level  */
        $studentSummerySchData = Students_summary::wherein('education_level_id', array(11,12,13))->where(['institute_id' => $inst_id])->get();
        if ($studentSummerySchData->isEmpty()) {
            $toAddedStudentSummery = [];
            $toInsertArr = [];
            foreach ($data->classes as $class) {
                if(empty($class['groups'])){
                    $toInsertArr['institute_id'] = $inst_id;
                    $toInsertArr['education_level_id'] = $class['education_level_id'];
                    $toInsertArr['class_id'] = $class['class_id'];
                    $toInsertArr['group_id'] = null;
                    array_push($toAddedStudentSummery, $toInsertArr);
                }
                else{
                    foreach ($class['groups'] as $group) {
                        $toInsertArr['institute_id'] = $inst_id;
                        $toInsertArr['education_level_id'] = $group['education_level_id'];
                        $toInsertArr['class_id'] = $class['class_id'];
                        $toInsertArr['group_id'] = $group['group_id'];
                        array_push($toAddedStudentSummery, $toInsertArr);
                    }
                }

            }
            try {
                Students_summary::insert($toAddedStudentSummery);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Student Summery Table');
            }
            /*Now Return ALl Student Summery rows*/
            $studentSummerySchData = Students_summary::wherein('education_level_id', array(11,12,13))->where(['institute_id' => $inst_id])->get();
        }
        $data->studentSummery = $studentSummerySchData;
        /*Students Summery School Ends*/

        /*Students Summery College Level  */
        $studentSummeryColData = Students_summary::wherein('education_level_id', array(31,32,33,34))->where(['institute_id' => $inst_id])->get();
        if ($studentSummeryColData->isEmpty()) {
            $toAddedStudentSummery = [];
            $toInsertArrSmC = [];
            foreach ($data->classes as $class) {
                if(empty($class['groups'])){
                    $toInsertArrSmC['institute_id'] = $inst_id;
                    $toInsertArrSmC['education_level_id'] = $class['education_level_id'];
                    $toInsertArrSmC['class_id'] = $class['class_id'];
                    $toInsertArrSmC['group_id'] = null;
                    array_push($toAddedStudentSummery, $toInsertArrSmC);
                }
                else{
                    foreach ($class['groups'] as $group) {
                        $toInsertArrSmC['institute_id'] = $inst_id;
                        $toInsertArrSmC['education_level_id'] = $group['education_level_id'];
                        $toInsertArrSmC['class_id'] = $class['class_id'];
                        $toInsertArrSmC['group_id'] = $group['group_id'];
                        array_push($toAddedStudentSummery, $toInsertArrSmC);
                    }
                }

            }
            try {
                Students_summary::insert($toAddedStudentSummery);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Student Summery Table');
            }
            /*Now Return ALl Student Summery rows*/
            $studentSummeryColData = Students_summary::wherein('education_level_id', array(31,32,33,34))->where(['institute_id' => $inst_id])->get();
        }
        $data->studentSummeryCol = $studentSummeryColData;
        /*Students Summery College Ends*/

        /*Student Summery Total*/
        //$toInsertArr['institute_id'] = $inst_id;
        $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first();
        if (empty($stdTotdata)) {
            $toInsertArrSmt = [];
            $toInsertArrSmt['institute_id'] = $inst_id;
            Student_summary_total::insert($toInsertArrSmt);
            $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryTotal = $stdTotdata;
        /*Student Summery Total*/

        /*Repeater*/
        $stdRepdata = Student_summary_repeater::where(['institute_id' => $inst_id])->first();
        if (empty($stdRepdata)) {
            $toInsertArrRp = [];
            $toInsertArrRp['institute_id'] = $inst_id;
            Student_summary_repeater::insert($toInsertArrRp);
            $stdRepdata = Student_summary_repeater::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryRepeater=$stdRepdata;
        /*Repeater*/

        /*Dropout*/
        $stdDropdata = Student_summary_dropout::where(['institute_id' => $inst_id])->first();
        if(empty($stdDropdata)){
            $toInsertArrDp = [];
            $toInsertArrDp['institute_id'] = $inst_id;
            Student_summary_dropout::insert($toInsertArrDp);
            $stdDropdata = Student_summary_dropout::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryDropout=$stdDropdata;
        /*Dropout*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }
}
