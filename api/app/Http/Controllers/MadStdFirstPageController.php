<?php

namespace App\Http\Controllers;

use App\Models\Submission_infos;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_total;
use App\Models\Students_summary;
use App\Models\Student_summary_repeater;
use App\Models\Student_summary_dropout;


class MadStdFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonMadFirst.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_sch_id = [20,21];
        $edu_level_id = [22, 23, 24, 25];
        $edu_level = [20, 21, 22, 23, 24, 25];
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
        $toInsertArr = [];
        /*Students Summery Secondary Level  */
        $studentSummeryData = Students_summary::where(['institute_id' => $inst_id])->get();
        if ($studentSummeryData->isEmpty()) {
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
            $studentSummeryData = Students_summary::where(['institute_id' => $inst_id])->get();
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
        return response()->json($data);
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
        $studentSummery = $data["studentSummery"];
        $studentSummaryTotal = $data["studentSummaryTotal"];
        $studentSummaryRepeater = $data["studentSummaryRepeater"];
        $studentSummaryDropout = $data["studentSummaryDropout"];
        /*==================Parsing Table wise data from Array End=======*/

        /*saving data of studentSummaryTotal */
        try {
            Student_summary_total::where('id', $studentSummaryTotal["id"])->update($studentSummaryTotal);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving stuentsSummery */

        try {
            Students_summary::where('institute_id', $instId)->delete();
            Students_summary::insert($studentSummery);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving studentSummaryRepeater */

        try {
            Student_summary_repeater::where('id', $studentSummaryRepeater["id"])->update($studentSummaryRepeater);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving studentSummaryDropout */
        try {
            Student_summary_dropout::where('id', $studentSummaryDropout["id"])->update($studentSummaryDropout);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->madrasa_1st_page = 1;
                $row->updated_at = time();
                $row->save();
                return response()->json("success", 200);
            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
                return response()->json($err, 500);
            }
        }
    }
}
