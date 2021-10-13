<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sectionwise_student_summary;
use App\Models\Yr_wise_hscbm;
use App\Models\Yr_wise_hscvocs;
use App\Models\Yr_wise_sscvocs;


class SnCSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonSnCSecond.php';

        $edu_sscvoc_id = 51;
        $edu_voc_id = 52;
        $edu_bm_id = 54;
        $data->sscVocClasses = [];
        $data->vocClasses = [];
        $data->bmClasses = [];

        foreach ($classesJsonData as $class) {
            if ($class['education_level_id'] == $edu_sscvoc_id) {
                array_push($data->sscVocClasses, $class);
            }
            if ($class['education_level_id'] == $edu_voc_id) {
                array_push($data->vocClasses, $class);
            }
            if ($class['education_level_id'] == $edu_bm_id) {
                array_push($data->bmClasses, $class);
            }
        }
        /*Sectionwise_student_summary*/
        $secWsStd = Sectionwise_student_summary::where(['institute_id' => $inst_id])->get();
        if ($secWsStd->isEmpty()) {
            $toAddedsecWsStd = [];
            foreach ($secList as $sec) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['section_id'] = $sec['section_id'];
                array_push($toAddedsecWsStd, $toInsertArr);
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
            foreach ($data->vocClasses as $class) {
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
        /*HSC BM Students*/
        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }


}
