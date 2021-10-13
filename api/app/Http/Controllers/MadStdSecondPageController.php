<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sectionwise_student_summary;
use App\Models\Yr_wise_hscbm;
use App\Models\Yr_wise_hscvocs;
use App\Models\Yr_wise_sscvocs;
use App\Models\Dakhilvoc_student_summary;
use App\Models\Alimvoc_student_summary;
use App\Models\Diploma_agri_krishis;


class MadStdSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonMadSecond.php';

        $edu_sscvoc_id = 51;
        $edu_voc_id = 52;
        $edu_bm_id = 54;
        $edu_diploma_agri_id = 91;
        $edu_diploma_fisheries_id = 93;
        $data->diplomaAgriClasses = [];
        $data->diplomaFisheriesClasses = [];
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
            if ($class['education_level_id'] == $edu_diploma_agri_id) {
                array_push($data->diplomaAgriClasses, $class);
            }
            if ($class['education_level_id'] == $edu_diploma_fisheries_id) {
                array_push($data->diplomaFisheriesClasses, $class);
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
        $sscVocStudentData = Yr_wise_sscvocs::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
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
            $sscVocStudentData = Yr_wise_sscvocs::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        }
        $data->sscVocStudent = $sscVocStudentData;
        /*SSC VOC Students*/

        /*Dakhil VOC Students */
        $dakhilVocStudentData = Dakhilvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        if ($dakhilVocStudentData->isEmpty()) {
            $toAddedDakVocData = [];
            foreach ($data->sscVocClasses as $class) {
                $toInsertArrDv = [];
                $toInsertArrDv['institute_id'] = $inst_id;
                $toInsertArrDv['education_level_id'] = $class['education_level_id'];
                $toInsertArrDv['class_id'] = $class['class_id'];
                array_push($toAddedDakVocData, $toInsertArrDv);
            }
            try {
                Dakhilvoc_student_summary::insert($toAddedDakVocData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save DAKHIL VOC Student Table');
            }
            /*Now Return dakhil voc rows*/
            $dakhilVocStudentData = Dakhilvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        }
        $data->dakhilVocStudentData = $dakhilVocStudentData;
        /*DAKHIL VOC Students*/

//        /*HSC VOC Students */
//        $hscVocStudentData = Yr_wise_hscvocs::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
//        if ($hscVocStudentData->isEmpty()) {
//            $toAddedHscVocData = [];
//            foreach ($data->vocClasses as $class) {
//                $toInsertArr = [];
//                $toInsertArr['institute_id'] = $inst_id;
//                $toInsertArr['education_level_id'] = $class['education_level_id'];
//                $toInsertArr['class_id'] = $class['class_id'];
//                array_push($toAddedHscVocData, $toInsertArr);
//            }
//            try {
//                Yr_wise_hscvocs::insert($toAddedHscVocData);
//            } catch (\Exception $e) {
//                array_push($err, 'Could Not Save HSC VOC Student Table');
//            }
//            /*Now Return HSC voc rows*/
//            $hscVocStudentData = Yr_wise_hscvocs::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
//        }
//        $data->hscVocStudent = $hscVocStudentData;
//        /*HSC VOC Students*/

//        /*ALIM VOC Students */
//        $alimVocStudentData = Alimvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
//        if ($alimVocStudentData->isEmpty()) {
//            $toAddedAlimVocData = [];
//            foreach ($data->vocClasses as $class) {
//                $toInsertArr = [];
//                $toInsertArr['institute_id'] = $inst_id;
//                $toInsertArr['education_level_id'] = $class['education_level_id'];
//                $toInsertArr['class_id'] = $class['class_id'];
//                array_push($toAddedAlimVocData, $toInsertArr);
//            }
//            try {
//                Alimvoc_student_summary::insert($toAddedAlimVocData);
//            } catch (\Exception $e) {
//                array_push($err, 'Could Not Save ALIM VOC Student Table');
//            }
//            /*Now Return ALIM voc rows*/
//            $alimVocStudentData = Alimvoc_student_summary::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
//        }
//        $data->alimVocStudentData = $alimVocStudentData;
//        /*ALIM VOC Students*/

        /*HSC BM Students */
        $hscBmStudentData = Yr_wise_hscbm::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
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
            $hscBmStudentData = Yr_wise_hscbm::where(['institute_id' => $inst_id])->orderBy('class_id')->get();
        }
        $data->hscBmStudent = $hscBmStudentData;
        /*HSC BM Students*/

        /*Diploma Fisheries Students */
        $hscDiplomaFisheriesStudentData = Diploma_agri_krishis::where(['institute_id' => $inst_id, 'education_level_id' => '93'])->orderby('class_id')->get();
        if ($hscDiplomaFisheriesStudentData->isEmpty()) {
            $toAddedDiplomaFisheriesData = [];
            foreach ($data->diplomaFisheriesClasses as $class) {
                $toInsertArrFs = [];
                $toInsertArrFs['institute_id'] = $inst_id;
                $toInsertArrFs['education_level_id'] = $class['education_level_id'];
                $toInsertArrFs['class_id'] = $class['class_id'];
                array_push($toAddedDiplomaFisheriesData, $toInsertArrFs);
            }
            try {
                Diploma_agri_krishis::insert($toAddedDiplomaFisheriesData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSC Diploma Fisheries Student Table');
            }
            /*Now Return HSC Diploma Fisheries Students rows*/
            $hscDiplomaFisheriesStudentData = Diploma_agri_krishis::where(['institute_id' => $inst_id, 'education_level_id' => '93'])->orderby('class_id')->get();
        }
        $data->hscDiplomaFisheries = $hscDiplomaFisheriesStudentData;
        /*Diploma Fisheries Students*/

        /*Diploma Agriculture Students */
        $hscDiplomaAgricultureStudentData = Diploma_agri_krishis::where(['institute_id' => $inst_id, 'education_level_id' => '91'])->orderby('class_id')->get();
        if ($hscDiplomaAgricultureStudentData->isEmpty()) {
            $toAddedDiplomaAgricultureData = [];
            foreach ($data->diplomaAgriClasses as $class) {
                $toInsertArrAgr = [];
                $toInsertArrAgr['institute_id'] = $inst_id;
                $toInsertArrAgr['education_level_id'] = $class['education_level_id'];
                $toInsertArrAgr['class_id'] = $class['class_id'];
                array_push($toAddedDiplomaAgricultureData, $toInsertArrAgr);
            }
            try {
                Diploma_agri_krishis::insert($toAddedDiplomaAgricultureData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSC Diploma Agriculture Student Table');
            }
            /*Now Return HSC Diploma Agriculture Students rows*/
            $hscDiplomaAgricultureStudentData = Diploma_agri_krishis::where(['institute_id' => $inst_id,  'education_level_id' => '91'])->orderby('class_id')->get();
        }
        $data->hscDiplomaAgriculture = $hscDiplomaAgricultureStudentData;
        /*Diploma Agriculture Students*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }


}
