<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_guardian_occupation;
use App\Models\Lookup_subjectdtl;
use App\Models\Student_summary_total;
use App\Models\Agewise_student_summary;
use App\Models\guardian_occupation;
use App\Models\Submission_infos;

class MadStdFourthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonMadFourth.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_ebt_id = 20;
        $edu_level_sch_id = 21;
        $edu_level_id = [22, 23, 24, 25];
        $edu_level = [20, 21, 22, 23, 24, 25];
        $data->ebtClasses = [];
        $data->schClasses = [];
        $data->colClasses = [];
        $data->classes = [];


        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();

        foreach ($classesJsonData as $class) {
            if ($class['education_level_id']==$edu_level_ebt_id) {
                array_push($data->ebtClasses, $class);
            }
            if ($class['education_level_id']==$edu_level_sch_id) {
                array_push($data->schClasses, $class);
            }
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->colClasses, $class);
            }

            if (in_array($class['education_level_id'], $edu_level)) {
                array_push($data->classes, $class);
            }

        }

        /*Student Summery Total*/
        $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first();
        if (empty($stdTotdata)) {
            $toInsertArr = [];
            $toInsertArr['institute_id'] = $inst_id;
            Student_summary_total::insert($toInsertArr);
            $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryTotal = $stdTotdata;
        $data->studentSummaryTotal->totAlimToMas = $stdTotdata->eleven_twelve_total+$stdTotdata->fazil_pass_total+$stdTotdata->fazil_honors_total+$stdTotdata->kamil_total+$stdTotdata->masters_total;
        $data->studentSummaryTotal->femAlimToMas = $stdTotdata->eleven_twelve_girl+$stdTotdata->fazil_pass_girl+$stdTotdata->fazil_honors_girl+$stdTotdata->kamil_girl+$stdTotdata->masters_girl;
        /*Student Summery Total*/

        /*Guardian Occupation*/
        //$data->occupationsList=Lookup_guardian_occupation::all();
        $data->occupationsList= $occupationsList;
        $guardianOccupation = guardian_occupation::where(['institute_id' => $inst_id])->orderBy('occupation_id')->get();
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
            $guardianOccupation = guardian_occupation::where(['institute_id' => $inst_id])->orderBy('occupation_id')->get();
        }
        $data->guardianOccupation = $guardianOccupation;
        /*Guardian Occupation*/

        /*Age Wise Students ebtedayi*/
        $ageWiseEbtStudentData=Agewise_student_summary::wherein('class_id', array(2000,2001,2002,2003,2004,2005))->where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        if ($ageWiseEbtStudentData->isEmpty()) {
            $toAddedAgeWiseStudentData = [];
            foreach ([2000, 2001, 2002, 2003, 2004, 2005] as $class) {
                $toInsertArrAg = [];
                $toInsertArrAg['institute_id'] = $inst_id;
                $toInsertArrAg['class_id'] = $class;
                array_push($toAddedAgeWiseStudentData, $toInsertArrAg);
            }
            try {
                Agewise_student_summary::insert($toAddedAgeWiseStudentData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Age Wise Table');
            }
            /*Now Return Age Wise rows*/
            $ageWiseEbtStudentData = Agewise_student_summary::wherein('class_id', array(2000, 2001, 2002, 2003, 2004, 2005))->where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        }
        $data->ageWiseEbtStudentData = $ageWiseEbtStudentData;
        /*Age Wise Students ebtedayi*/

        /*Age Wise Secondary*/
        $ageWiseSecStudentData=Agewise_student_summary::wherein('class_id', array(2106,2107,2108,2109,2110))->where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        if ($ageWiseSecStudentData->isEmpty()) {
            $toAddedAgeWiseStudentData = [];
            foreach ([2106, 2107, 2108, 2109, 2110] as $class) {
                $toInsertArrAgs = [];
                $toInsertArrAgs['institute_id'] = $inst_id;
                $toInsertArrAgs['class_id'] = $class;
                array_push($toAddedAgeWiseStudentData, $toInsertArrAgs);
            }
            try {
                Agewise_student_summary::insert($toAddedAgeWiseStudentData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Age Wise Table');
            }
            /*Now Return Age Wise rows*/
            $ageWiseSecStudentData=Agewise_student_summary::wherein('class_id', array(2106,2107,2108,2109,2110))->where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        }
        $data->ageWiseSecStudentData = $ageWiseSecStudentData;
        /*Age Wise Students*/

        /*Age Wise degree*/
        $ageWiseStudentData = Agewise_student_summary::wherein('class_id', array(2211,2212,2313,2314,2315,2316,2317,2318,2319,2415,2416,2518))->where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        if ($ageWiseStudentData->isEmpty()) {
            $toAddedAgeWiseStudentData = [];
            foreach ([2211, 2212, 2313, 2314, 2315, 2316, 2317, 2318, 2319, 2415, 2416, 2518] as $class) {
                $toInsertArrAgd = [];
                $toInsertArrAgd['institute_id'] = $inst_id;
                $toInsertArrAgd['class_id'] = $class;
                array_push($toAddedAgeWiseStudentData, $toInsertArrAgd);
            }
            try {
                Agewise_student_summary::insert($toAddedAgeWiseStudentData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Age Wise Table');
            }
            /*Now Return Age Wise rows*/
            $ageWiseStudentData = Agewise_student_summary::wherein('class_id', array(2211,2212,2313,2314,2315,2316,2317,2318,2319,2415,2416,2518))->where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        }
        $data->ageWiseStudent = $ageWiseStudentData;
        /*Age Wise Students*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

}
