<?php

namespace App\Http\Controllers;

use App\Models\Submission_infos;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_guardian_occupation;
use App\Models\Lookup_subjectdtl;
use App\Models\Student_summary_total;
use App\Models\Agewise_student_summary;
use App\Models\guardian_occupation;
use App\Models\Subjectwise_student_summary;

class SchoolThirdPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonSchoolThird.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_id = [11,12,13];
        $edu_level_primary_id = 11;
        $edu_level_sch_age_id = [12, 13];
        $data->primaryAgeClasses = [];
        $data->secAgeclasses = [];
        $data->ageClasses = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get()

        foreach ($classesJsonData as $class) {
            if ($class['education_level_id']==$edu_level_primary_id) {
                array_push($data->primaryAgeClasses, $class);
            }
            if (in_array($class['education_level_id'], $edu_level_sch_age_id)) {
                array_push($data->secAgeclasses, $class);
            }

            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->ageClasses, $class);
            }
        }
        //return response()->json($classesJsonData);

        /*Student Summery Total*/
        $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first(['id','institute_id','one_five_total','one_five_girl','six_ten_total','six_ten_girl']);
        if (empty($stdTotdata)) {
            $toInsertArr = [];
            $toInsertArr['institute_id'] = $inst_id;
            Student_summary_total::insert($toInsertArr);
            $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first(['id','institute_id','one_five_total','one_five_girl','six_ten_total','six_ten_girl']);
        }
        $data->studentSummaryTotal = $stdTotdata;
        /*Student Summery Total*/

        /*Age Wise Students*/
        $ageWiseStudentData = Agewise_student_summary::wherein('class_id', array(1206,1207,1208,1309,1310))->where(['institute_id' => $inst_id])->orderBy('class_id','asc')->get();
        if ($ageWiseStudentData->isEmpty()){
            $toAddedAgeWiseStudentData = [];
            foreach ([1206,1207,1208,1309,1310] as $class) {
                $toInsertArrAg = [];
                $toInsertArrAg['institute_id'] = $inst_id;
                $toInsertArrAg['class_id'] = $class;
                array_push($toAddedAgeWiseStudentData, $toInsertArrAg);
            }
            try {
                Agewise_student_summary::insert($toAddedAgeWiseStudentData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Age Wise 6-10 Table');
            }
            /*Now Return Age Wise rows*/
            $ageWiseStudentData = Agewise_student_summary::wherein('class_id', array(1206,1207,1208,1309,1310))->where(['institute_id' => $inst_id])->orderBy('class_id','asc')->get();
        }
        $data->ageWiseStudent = $ageWiseStudentData;

        $ageWisePrimaryStudentData=Agewise_student_summary::wherein('class_id', array(1100,1101,1102,1103,1104,1105))->where(['institute_id' => $inst_id])->orderBy('class_id','asc')->get();
        if ($ageWisePrimaryStudentData->isEmpty()){
            $toAddedAgeWiseStudentData = [];
            foreach ([1100,1101,1102,1103,1104,1105] as $class) {
                $toInsertArrAgp = [];
                $toInsertArrAgp['institute_id'] = $inst_id;
                $toInsertArrAgp['class_id'] = $class;
                array_push($toAddedAgeWiseStudentData, $toInsertArrAgp);
            }
//            var_dump($toAddedAgeWiseStudentData);exit;
            try {
                Agewise_student_summary::insert($toAddedAgeWiseStudentData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Age Wise 1-5 Table');
            }
            /*Now Return Age Wise rows*/
            $ageWisePrimaryStudentData = Agewise_student_summary::wherein('class_id', array(1100,1101,1102,1103,1104,1105))->where(['institute_id' => $inst_id])->orderBy('class_id','asc')->get();
        }
        $data->ageWisePrimaryStudentData = $ageWisePrimaryStudentData;
        /*Age Wise Students*/

        /*Guardian Occupation*/
        //$data->occupationsList=Lookup_guardian_occupation::all();
        $data->occupationsList= $occupationsList;
        $guardianOccupation = guardian_occupation::where(['institute_id' => $inst_id])->get();
        if ($guardianOccupation->isEmpty()) {
            $toAddedGuardianOccupation = [];
            foreach ($occupationsList as $occupation) {
                $toInsertArrOc = [];
                $toInsertArrOc['institute_id'] = $inst_id;
                $toInsertArrOc['occupation_id'] = $occupation['occupation_id'];
                array_push($toAddedGuardianOccupation, $toInsertArrOc);
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

        /*Subject wise teacher student summery*/
        $subjectWiseData = Subjectwise_student_summary::where(['institute_id' => $inst_id])->orderBy('subject_id')->get();
        //$data->subjectList = Lookup_subjectdtl::where(['institute_type_id'=>1])->orderBy('subjectdtl_id')->get();
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

}
