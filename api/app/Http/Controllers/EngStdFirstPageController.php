<?php

namespace App\Http\Controllers;

use App\Models\Submission_infos;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Students_summary;
use App\Models\Agewise_student_summary;


class EngStdFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonEngFirst.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_id = [96, 97, 98];
        $edu_level_age = [97,98];
        $data->ageClasses = [];
        $data->classes = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();
        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_age)) {
                array_push($data->ageClasses, $class);
            }
            if (in_array($class['education_level_id'], $edu_level_id)) {
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

        /*Age Wise Students*/

        $ageWiseStudentData = Agewise_student_summary::where(['institute_id' => $inst_id])->get();
        if ($ageWiseStudentData->isEmpty()) {
            $toAddedAgeWiseStudentData = [];
            foreach ($data->ageClasses as $class) {
                $toInsertArrAg = [];
                $toInsertArrAg['institute_id'] = $inst_id;
                $toInsertArrAg['class_id'] = $class['class_id'];
                array_push($toAddedAgeWiseStudentData, $toInsertArrAg);
            }
            try {
                Agewise_student_summary::insert($toAddedAgeWiseStudentData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Age Wise Table');
            }
            /*Now Return Age Wise rows*/
            $ageWiseStudentData = Agewise_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->ageWiseStudent = $ageWiseStudentData;
        /*Age Wise Students*/

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
        $ageWiseStudent = $data["ageWiseStudent"];
        /*==================Parsing Table wise data from Array End=======*/

        /* saving stuentsSummery */

        try {
            Students_summary::where('institute_id', $instId)->delete();
            Students_summary::insert($studentSummery);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving $ageWiseStudent  */
        try {
            Agewise_student_summary::where('institute_id', $instId)->delete();
            Agewise_student_summary::insert($ageWiseStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->english_2nd_page = 1;
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
