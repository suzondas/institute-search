<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_guardian_occupation;
use App\Models\Lookup_subjectdtl;
use App\Models\Agewise_student_summary;
use App\Models\guardian_occupation;
use App\Models\Enterprenership_stds;
use App\Models\Institutes_other_info;
use App\Models\Students_open_university;
use App\Models\Result_open_university;



class TecStdSixthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonTecSix.php';

        /*Education Level Wise Classes with Groups Fetching*/

        $age_edu_level = [51, 52, 40];
        $data->ageClasses = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();

        foreach ($classesJsonData as $class) {
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
        $ageWiseStudentData = Agewise_student_summary::where(['institute_id' => $inst_id])->orderby('id')->get();
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
            $ageWiseStudentData = Agewise_student_summary::where(['institute_id' => $inst_id])->orderby('id')->get();
        }
        $data->ageWiseStudent = $ageWiseStudentData;
        /*Age Wise Students*/

        /*Enterprenership_stds*/
        $enterprenerData = Enterprenership_stds::where(['institute_id' => $inst_id])->first();
        if(empty($enterprenerData)){
            $toInsertArrEn = [];
            $toInsertArrEn['institute_id'] = $inst_id;
            Enterprenership_stds::insert($toInsertArrEn);
            $enterprenerData = Enterprenership_stds::where(['institute_id' => $inst_id])->first();
        }
        $data->enterprenerData=$enterprenerData;
        /*Enterprenership_stds*/

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
