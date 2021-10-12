<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_guardian_occupation;
use App\Models\Lookup_subjectdtl;
use App\Models\Agewise_student_summary;
use App\Models\guardian_occupation;
use App\Models\Subjectwise_student_summary;
use App\Models\Submission_infos;
class SnCFourthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonSnCFourth.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_sch_id = [11,12, 13];
        $edu_level_sch_age_id = [12, 13];
        $edu_level_id = [31, 32, 33, 34];
        $edu_level = [11, 12, 13, 31, 32, 33, 34];
        $age_edu_level = [12, 13, 31, 32, 33, 34];
        $data->schClasses = [];
        $data->schAgeClasses = [];
        $data->colClasses = [];
        $data->classes = [];
        $data->ageClasses = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();

        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_sch_id)) {
                array_push($data->schClasses, $class);
            }
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->colClasses, $class);
            }
            if (in_array($class['education_level_id'], $edu_level_sch_age_id)) {
                array_push($data->schAgeClasses, $class);
            }

            if (in_array($class['education_level_id'], $edu_level)) {
                array_push($data->classes, $class);
            }
            if (in_array($class['education_level_id'], $age_edu_level)) {
                array_push($data->ageClasses, $class);
            }
        }


        /*Guardian Occupation*/
        //$data->occupationsList=Lookup_guardian_occupation::all();
        $data->occupationsList= $occupationsList;
        $guardianOccupation = guardian_occupation::where(['institute_id' => $inst_id])->get();
        if ($guardianOccupation->isEmpty()) {
            $toAddedGuardianOccupation = [];
            foreach ($occupationsList as $occupation) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['occupation_id'] = $occupation['occupation_id'];
                array_push($toAddedGuardianOccupation, $toInsertArr);
            }
            try {
                guardian_occupation::insert($toAddedGuardianOccupation);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Guardian Occupation Table');
            }
            /*Now Return Guardian Occupation rows*/
            $guardianOccupation = guardian_occupation::where(['institute_id' => $inst_id])->get();
        }
        $data->guardianOccupation = $guardianOccupation;
        /*Guardian Occupation*/

        /*Age Wise Students*/
        $ageWiseSecStudentData=Agewise_student_summary::wherein('class_id', array(1206,1207,1208,1309,1310))->where(['institute_id' => $inst_id])->get();
        $ageWiseStudentData = Agewise_student_summary::wherein('class_id', array(3111,3112,3213,3214,3215,3316,3422))->where(['institute_id' => $inst_id])->get();
        if ($ageWiseStudentData->isEmpty() && $ageWiseSecStudentData->isEmpty()) {
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
            $ageWiseSecStudentData = Agewise_student_summary::wherein('class_id', array(1206,1207,1208,1309,1310))->where(['institute_id' => $inst_id])->get();
            $ageWiseStudentData = Agewise_student_summary::wherein('class_id', array(3111,3112,3213,3214,3215,3316,3422))->where(['institute_id' => $inst_id])->get();
        }
        $data->ageWiseSecStudentData = $ageWiseSecStudentData;
        $data->ageWiseStudent = $ageWiseStudentData;
        /*Age Wise Students*/

        /*Subject wise teacher student summery*/
        $subjectWiseData = Subjectwise_student_summary::where(['institute_id' => $inst_id])->orderBy('subject_id')->get();
        //$data->subjectList = Lookup_subjectdtl::where(['institute_type_id'=>4])->get();
        $data->subjectList = $subjectList;
        if ($subjectWiseData->isEmpty()) {
            $toAddsubjectWiseData = [];
            foreach ($data->subjectList as $subject) {
                $toInsertArrSw = [];
                $toInsertArrSw['institute_id'] = $inst_id;
                $toInsertArrSw['subject_id'] = $subject['subjectdtl_id'];
                array_push($toAddsubjectWiseData, $toInsertArrSw);
            }
            try {
                Subjectwise_student_summary::insert($toAddsubjectWiseData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Subject Wise Table');
            }
            /*Now Return Subjectwise_student_summary rows*/
            $subjectWiseData = Subjectwise_student_summary::where(['institute_id' => $inst_id])->orderBy('subject_id')->get();
        }

        $data->subjectWiseData = $subjectWiseData;
        /*Subject wise teacher student summery*/

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
        $guardianOccupation = $data["guardianOccupation"];
        $ageWiseSecStudentData = $data["ageWiseSecStudentData"];
        $ageWiseStudent = $data["ageWiseStudent"];
        $subjectWiseData = $data["subjectWiseData"];

        /*==================Parsing Table wise data from Array End=======*/

        /*saving data of guardian_occupation */
        try {
            guardian_occupation::where('institute_id', $instId)->delete();
            guardian_occupation::insert($guardianOccupation);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving $ageWiseSecStudentData */

        try {
            Agewise_student_summary::wherein('class_id', array(1206,1207,1208,1309,1310))->where('institute_id', $instId)->delete();
            Agewise_student_summary::insert($ageWiseSecStudentData);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving $ageWiseStudent College */

        try {
            Agewise_student_summary::wherein('class_id', array(3111,3112,3213,3214,3215,3316,3422))->where('institute_id', $instId)->delete();
            Agewise_student_summary::insert($ageWiseStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Subjectwise_student_summary */

        try {
            Subjectwise_student_summary::where('institute_id', $instId)->delete();
            Subjectwise_student_summary::insert($subjectWiseData);
        } catch (\Exception $e) {
            array_push($err, $e);
        }


        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->school_col_4th_page = 1;
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
