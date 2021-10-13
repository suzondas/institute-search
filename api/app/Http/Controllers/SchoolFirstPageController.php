<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_total;
use App\Models\Students_summary;
use App\Models\Student_summary_repeater;
use App\Models\Student_summary_dropout;
use App\Models\Sectionwise_student_summary;
use App\Models\Submission_infos;

class SchoolFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonSchool.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_id = [11, 12, 13];
        $data->classes = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();

        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->classes, $class);
            }

        }

        /*Education Level Wise Classes with Groups Fetching Ends*/
        //return response()->json($data);
        $toInsertArr = [];
        /*Students Summery Secondary Level  */
        $studentSummeryData = Students_summary::wherein('education_level_id', array(11, 12, 13))->where(['institute_id' => $inst_id])->get();
        if ($studentSummeryData->isEmpty()) {
            $toAddedStudentSummery = [];
            $toInsertArr = [];
            foreach ($data->classes as $class) {
                if (empty($class['groups'])) {
                    $toInsertArr['institute_id'] = $inst_id;
                    $toInsertArr['education_level_id'] = $class['education_level_id'];
                    $toInsertArr['class_id'] = $class['class_id'];
                    $toInsertArr['group_id'] = null;
                    array_push($toAddedStudentSummery, $toInsertArr);
                } else {
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
            $studentSummeryData = Students_summary::wherein('education_level_id', array(11, 12, 13))->where(['institute_id' => $inst_id])->get();
        }
        $data->studentSummery = $studentSummeryData;
        /*Students Summery School Ends*/

        /*Student Summery Total*/
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
        $data->studentSummaryRepeater = $stdRepdata;
        /*Repeater*/

        /*Dropout*/
        $stdDropdata = Student_summary_dropout::where(['institute_id' => $inst_id])->first();
        if (empty($stdDropdata)) {
            $toInsertArrDp = [];
            $toInsertArrDp['institute_id'] = $inst_id;
            Student_summary_dropout::insert($toInsertArrDp);
            $stdDropdata = Student_summary_dropout::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryDropout = $stdDropdata;
        /*Dropout*/

        /*Sectionwise_student_summary*/
        $secWsStd = Sectionwise_student_summary::where(['institute_id' => $inst_id])->get();
        if ($secWsStd->isEmpty()) {
            $toAddedsecWsStd = [];
            foreach ($secList as $sec) {
                $toInsertArrScW = [];
                $toInsertArrScW['institute_id'] = $inst_id;
                $toInsertArrScW['section_id'] = $sec['section_id'];
                array_push($toAddedsecWsStd, $toInsertArrScW);
            }
            try {
                Sectionwise_student_summary::insert($toAddedsecWsStd);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Sectionwise_student_summary Table');
            }
            /*Now Return Sectionwise_student_summary rows*/
            $secWsStd = Sectionwise_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->secWsStd = $secWsStd;
        /*Sectionwise_student_summary*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

}
