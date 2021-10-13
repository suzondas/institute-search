<?php

namespace App\Http\Controllers;

use App\Models\Submission_infos;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Ttc_trainee_summaries;
use App\Models\Bed_trainee_summaries;
use App\Models\Institutes_other_info;
use App\Models\Students_open_university;
use App\Models\Result_open_university;

class TtcStdFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        require_once app()->basePath('app') . '/Helpers/LookUpJsonTtcStd.php';
        $toInsertArr = [];
        $data->trainName = $classesJsonData;
        $data->bedTrainName = $bedClassList;

        /*SSCVOC Students*/
        //$sscTradeList = Lookup_ssc_voc::where(['cur_id' => 27])->get(); //load data from json
        //$data->ssctrad=$sscTradeList;
        $ttc_trainee_summaries = Ttc_trainee_summaries::where(['institute_id' => $inst_id])->get();
        if ($ttc_trainee_summaries->isEmpty()) {
            $toAddedTraineeSum = [];
            foreach ($classesJsonData as $class) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['class_id'] = $class['class_id'];
                $toInsertArr['education_level_id'] = $class['education_level_id'];
                array_push($toAddedTraineeSum, $toInsertArr);
            }
            try {
                Ttc_trainee_summaries::insert($toAddedTraineeSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Trainee Summary Table');
            }
            /*Now Return Ttc_trainee_summaries rows*/
            $ttc_trainee_summaries = Ttc_trainee_summaries::where(['institute_id' => $inst_id])->get();
        }
        $data->ttc_trainee_summaries = $ttc_trainee_summaries;
        /*Ttc_trainee_summaries Students*/

        $bed_trainee_summaries = Bed_trainee_summaries::where(['institute_id' => $inst_id])->get();
        if ($bed_trainee_summaries->isEmpty()) {
            $toAddedBedTraineeSum = [];
            foreach ($bedClassList as $class) {
                $toInsertArrBts = [];
                $toInsertArrBts['institute_id'] = $inst_id;
                $toInsertArrBts['class_id'] = $class['class_id'];
                $toInsertArrBts['education_level_id'] = $class['education_level_id'];
                array_push($toAddedBedTraineeSum, $toInsertArrBts);
            }
            try {
                Bed_trainee_summaries::insert($toAddedBedTraineeSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Trainee Summary Table');
            }
            /*Now Return Ttc_trainee_summaries rows*/
            $bed_trainee_summaries = Bed_trainee_summaries::where(['institute_id' => $inst_id])->get();
        }
        $data->bed_trainee_summaries = $bed_trainee_summaries;
        /*Ttc_trainee_summaries Students*/

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

}
