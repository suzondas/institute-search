<?php

namespace App\Http\Controllers;

use App\Models\One_yr_adv_certificate;
use App\Models\One_yr_certificate;
use App\Models\Sectionwise_student_summary;
use App\Models\Student_summary_dropout;
use App\Models\Student_summary_repeater;
use App\Models\Yr_wise_hscbm;
use App\Models\Yr_wise_hscvocs;
use App\Models\Yr_wise_sscvocs;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_total;
use App\Models\Submission_infos;

class TecStdFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonTecFirst.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_sscvoc_id = 51;
        $edu_hsc_voc_id = 52;
        $edu_bm_id = 54;
        $edu_one_yr_cert_id=50;
        $edu_one_yr_adv_cert_id = 99;
        $data->sscVocClasses = [];
        $data->hscVocClasses = [];
        $data->bmClasses = [];
        $data->oneYrClasses = [];
        $data->oneYrAdvClasses = [];


       // return response()->json($classesJsonData);
        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();
        foreach ($classesJsonData as $class) {
            if(isset($class['education_level_id'])) {
                if ($class['education_level_id'] == $edu_sscvoc_id) {
                    array_push($data->sscVocClasses, $class);
                }
                if ($class['education_level_id'] == $edu_hsc_voc_id) {
                    array_push($data->hscVocClasses, $class);
                }
                if ($class['education_level_id'] == $edu_bm_id) {
                    array_push($data->bmClasses, $class);
                }
                if($class['education_level_id']== $edu_one_yr_cert_id){
                    array_push($data->oneYrClasses,$class);
                }
                if($class['education_level_id']== $edu_one_yr_adv_cert_id){
                    array_push($data->oneYrAdvClasses,$class);
                }
            }
        }

        /*Education Level Wise Classes with Groups Fetching Ends*/
        //return response()->json($data);
        $toInsertArr = [];
        /*Student Summery Total*/
        $toInsertArr['institute_id'] = $inst_id;
        $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first();
        if (empty($stdTotdata)) {
            Student_summary_total::insert($toInsertArr);
            $stdTotdata = Student_summary_total::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryTotal = $stdTotdata;
        /*Student Summery Total*/

        /*SSC VOC Students */
        $sscVocStudentData = Yr_wise_sscvocs::where(['institute_id' => $inst_id])->get();
        if ($sscVocStudentData->isEmpty()) {
            $toAddedSscVocData = [];
            foreach ($data->sscVocClasses as $class) {
                $toInsertArrSv = [];
                $toInsertArrSv['institute_id'] = $inst_id;
                $toInsertArrSv['education_level_id'] = $class['education_level_id'];
                $toInsertArrSv['class_id'] = $class['class_id'];
                array_push($toAddedSscVocData, $toInsertArrSv);
            }
            try {
                Yr_wise_sscvocs::insert($toAddedSscVocData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save SSC VOC Student Table');
            }
            /*Now Return SSC voc rows*/
            $sscVocStudentData = Yr_wise_sscvocs::where(['institute_id' => $inst_id])->get();
        }
        $data->sscVocStudent = $sscVocStudentData;
        /*SSC VOC Students*/

        /*HSC VOC Students */
        $hscVocStudentData = Yr_wise_hscvocs::where(['institute_id' => $inst_id])->get();
        if ($hscVocStudentData->isEmpty()) {
            $toAddedHscVocData = [];
            foreach ($data->hscVocClasses as $class) {
                $toInsertArrHv = [];
                $toInsertArrHv['institute_id'] = $inst_id;
                $toInsertArrHv['education_level_id'] = $class['education_level_id'];
                $toInsertArrHv['class_id'] = $class['class_id'];
                array_push($toAddedHscVocData, $toInsertArrHv);
            }
            try {
                Yr_wise_hscvocs::insert($toAddedHscVocData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSC VOC Student Table');
            }
            /*Now Return HSC voc rows*/
            $hscVocStudentData = Yr_wise_hscvocs::where(['institute_id' => $inst_id])->get();
        }
        $data->hscVocStudent = $hscVocStudentData;
        /*HSC VOC Students*/

        /*HSC BM Students */
        $hscBmStudentData = Yr_wise_hscbm::where(['institute_id' => $inst_id])->get();
        if ($hscBmStudentData->isEmpty()) {
            $toAddedHscBmData = [];
            foreach ($data->bmClasses as $class) {
                $toInsertArrBm = [];
                $toInsertArrBm['institute_id'] = $inst_id;
                $toInsertArrBm['education_level_id'] = $class['education_level_id'];
                $toInsertArrBm['class_id'] = $class['class_id'];
                array_push($toAddedHscBmData, $toInsertArrBm);
            }
            try {
                Yr_wise_hscbm::insert($toAddedHscBmData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSC BM Student Table');
            }
            /*Now Return HSC BM Students rows*/
            $hscBmStudentData = Yr_wise_hscbm::where(['institute_id' => $inst_id])->get();
        }
        $data->hscBmStudent = $hscBmStudentData;
        /*HSC BM Students $data->one_yr_certificate*/

        /*one year certificate*/
        $oneYrCertificate = One_yr_certificate::where(['institute_id' => $inst_id])->get();
        if ($oneYrCertificate->isEmpty()) {
            $toAddedOneYrCertificate = [];
            foreach ($data->oneYrClasses as $class) {
                $toInsertArrOcrt = [];
                $toInsertArrOcrt['institute_id'] = $inst_id;
                $toInsertArrOcrt['education_level_id'] = $class['education_level_id'];
                $toInsertArrOcrt['class_id'] = $class['class_id'];
                array_push($toAddedOneYrCertificate, $toInsertArrOcrt);
            }
            try {
                One_yr_certificate::insert($toAddedOneYrCertificate);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save One Yr Certificate Table');
            }
            /*Now Return One yr Certificate rows*/
            $oneYrCertificate = One_yr_certificate::where(['institute_id' => $inst_id])->get();
        }
        $data->one_yr_certificate = $oneYrCertificate;

        /*one year Advance certificate*/
        $oneYrAdvCertificate = One_yr_adv_certificate::where(['institute_id' => $inst_id])->get();
        if ($oneYrAdvCertificate->isEmpty()) {
            $toAddedOneYrAdvCertificate = [];
            foreach ($data->oneYrAdvClasses as $class) {
                $toInsertArrOca = [];
                $toInsertArrOca['institute_id'] = $inst_id;
                $toInsertArrOca['education_level_id'] = $class['education_level_id'];
                $toInsertArrOca['class_id'] = $class['class_id'];
                array_push($toAddedOneYrAdvCertificate, $toInsertArrOca);
            }
            try {
                One_yr_adv_certificate::insert($toAddedOneYrAdvCertificate);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save One Yr advanced Certificate Table');
            }
            /*Now Return One yr Advance Certificate rows*/
            $oneYrAdvCertificate = One_yr_adv_certificate::where(['institute_id' => $inst_id])->get();
        }
        $data->one_yr_adv_certificate = $oneYrAdvCertificate;

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
