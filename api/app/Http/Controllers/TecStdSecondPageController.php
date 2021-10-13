<?php

namespace App\Http\Controllers;


use App\Models\Hscbm_student_summary;
use App\Models\Lookup_diploma;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Diploma_engineers;
use App\Models\Basic_crs_sammaries;
use App\Models\Sscvoc_student_summary;
use App\Models\Hscvoc_student_summary;
use App\Models\Inst_curriculums;

class TecStdSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonTecSecond.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_dip_id=67;
        $data->diplomaClasses=[];

    //  return response()->json($classesJsonData);
        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();
        foreach ($classesJsonData as $class) {
            if (isset($class['education_level_id'])) {
                if ($class['education_level_id'] == $edu_dip_id) {
                    array_push($data->diplomaClasses, $class);
                }
            }
        }

       // return response()->json($dipCommerceList);

        $toInsertArr = [];
        /*Diploma Students */
        $dipStudentData = Diploma_engineers::where(['institute_id' => $inst_id])->get();
        if ($dipStudentData->isEmpty()) {
            $toAddedDiplomaData = [];
            foreach ($data->diplomaClasses as $class) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['education_level_id'] = $class['education_level_id'];
                $toInsertArr['class_id'] = $class['class_id'];
                array_push($toAddedDiplomaData, $toInsertArr);
            }
            try {
                Diploma_engineers::insert($toAddedDiplomaData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save SSC VOC Student Table');
            }
            /*Now Return SSC voc rows*/
            $dipStudentData = Diploma_engineers::where(['institute_id' => $inst_id])->get();
        }
        $data->dipStudentData = $dipStudentData;

        /*Basic_crs_sammaries*/
        $stdBasicCrsdata = Basic_crs_sammaries::where(['institute_id' => $inst_id])->first();
        if (empty($stdBasicCrsdata)) {
            $toInsertArrCrs = [];
            $toInsertArrCrs['institute_id'] = $inst_id;
            Basic_crs_sammaries::insert($toInsertArrCrs);
            $stdBasicCrsdata = Basic_crs_sammaries::where(['institute_id' => $inst_id])->first();
        }
        $data->stdBasicCrsdata = $stdBasicCrsdata;
        /*Basic_crs_sammaries*/

        /*Inst_curriculums needed for enable and disable curriculumn table*/
        $data->instCurriculums = Inst_curriculums::where(['institute_id'=>$inst_id])->first();

        /*SSCVOC Students*/
        //$sscTradeList = Lookup_ssc_voc::where(['cur_id' => 27])->get(); //load data from json
        //$data->ssctrad=$sscTradeList;
        if($data->instCurriculums->el_ssc_voc==1 or $data->instCurriculums->el_dakhil_voc==1){
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
        }else{
            $data->sscVocStd = [];
        }

        /*hsc Voc Students*/
        if($data->instCurriculums->el_hsc_voc==1) {
            $hscVocStd = Hscvoc_student_summary::where(['institute_id' => $inst_id])->get();
            if ($hscVocStd->isEmpty()) {
                $toAddedHscVoc = [];
                foreach ($hscTradeList as $trade) {
                    $toInsertArrHv = [];
                    $toInsertArrHv['institute_id'] = $inst_id;
                    $toInsertArrHv['cur_id'] = $trade['cur_id'];
                    $toInsertArrHv['trade_code'] = $trade['trade_code'];
                    $toInsertArrHv['trade_name'] = $trade['trade_name'];
                    array_push($toAddedHscVoc, $toInsertArrHv);
                }
                try {
                    Hscvoc_student_summary::insert($toAddedHscVoc);
                } catch (\Exception $e) {
                    array_push($err, 'Could Not Save HSCVOC Table');
                }
                /*Now Return HSCVOC rows*/
                $hscVocStd = Hscvoc_student_summary::where(['institute_id' => $inst_id])->get();
            }
            $data->hscVocStdData = $hscVocStd;
        }else{
            $data->hscVocStdData = [];
        }

        /*hsc BM Students*/
        if($data->instCurriculums->el_hsc_bm==1) {
            $hscBmStd = Hscbm_student_summary::where(['institute_id' => $inst_id])->get();
            if ($hscBmStd->isEmpty()) {
                $toAddedHscBm = [];
                foreach ($hscBmList as $trade) {
                    $toInsertArrBm = [];
                    $toInsertArrBm['institute_id'] = $inst_id;
                    $toInsertArrBm['cur_id'] = $trade['cur_id'];
                    $toInsertArrBm['trade_code'] = $trade['trade_code'];
                    $toInsertArrBm['trade_name'] = $trade['trade_name'];
                    array_push($toAddedHscBm, $toInsertArrBm);
                }
                try {
                    Hscbm_student_summary::insert($toAddedHscBm);
                } catch (\Exception $e) {
                    array_push($err, 'Could Not Save HSCBM Table');
                }
                /*Now Return HSCVOC rows*/
                $hscBmStd = Hscbm_student_summary::where(['institute_id' => $inst_id])->get();
            }
            $data->hscBmStdData = $hscBmStd;
        }else{
            $data->hscBmStdData = [];
        }

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

}
