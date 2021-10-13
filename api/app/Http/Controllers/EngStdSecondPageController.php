<?php

namespace App\Http\Controllers;

use App\Models\Subjectwise_student_summary;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_category_student;
use App\Models\Lookup_disability;
use App\Models\Lookup_subjectdtl;
use App\Models\Categorywise_student_summary;
use App\Models\Institutes_special_student;
use App\Models\Categorywise_disable;
use App\Models\Board_exam_result;

class EngStdSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonEngSecond.php';

        $toInsertArr = [];

        /*Category Wise Students */
        //$data->categoryWiseList = Lookup_category_student::all();
        //return response()->json( $data->categoryWiseList);
        $data->categoryWiseList = $categoryWiseList;
        //return response()->json($categoryWiseList);
        $categoryWiseStudentData = Categorywise_student_summary::where(['institute_id' => $inst_id])->get();
        if ($categoryWiseStudentData->isEmpty()) {
            $toAddedCategoryWiseData = [];
            foreach ($categoryWiseList as $category) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['category_id'] = $category['category_id'];
                array_push($toAddedCategoryWiseData, $toInsertArr);
            }
            try {
                Categorywise_student_summary::insert($toAddedCategoryWiseData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Category Wise Student Table');
            }
            /*Now Return Category Wise Students rows*/
            $categoryWiseStudentData = Categorywise_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->categoryWiseStudent = $categoryWiseStudentData;
        /*Category Wise Students*/

        /*Inst Special Need*/
        $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        if(empty($instSpecialInfo)){
            $toInsertArrSp['institute_id'] = $inst_id;
            Institutes_special_student::insert($toInsertArrSp);
            $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        }
        $data->instituteSpecialStudents = $instSpecialInfo;
        /*Institutes_special_student*/

        /*Category Wise Disable Students */
        //$data->disableCategory=Lookup_disability::all();
        $data->disableCategory = $disableCategory;
        $categoryWiseStudentDisableData = Categorywise_disable::where(['institute_id' => $inst_id])->get();
        if ($categoryWiseStudentDisableData->isEmpty()) {
            $toAddedCategoryWiseDisableData = [];
            foreach ($disableCategory as $category) {
                $toInsertArrDc = [];
                $toInsertArrDc['institute_id'] = $inst_id;
                $toInsertArrDc['disable_type'] = $category['disable_type'];
                array_push($toAddedCategoryWiseDisableData, $toInsertArrDc);
            }
            try {
                Categorywise_disable::insert($toAddedCategoryWiseDisableData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Category Wise Disable Student Table');
            }
            /*Now Return Category Wise Disable rows*/
            $categoryWiseStudentDisableData = Categorywise_disable::where(['institute_id' => $inst_id])->get();
        }
        $data->categoryWiseDisableStudent = $categoryWiseStudentDisableData;
        /*Category Wise Disable Students*/

        /*Subject wise teacher student summery*/
        $subjectWiseData = Subjectwise_student_summary::where(['institute_id' => $inst_id])->orderBy('subject_id')->get();
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

        /*Group wise Board Result*/
        $data->examLevel = $examLevel;
        $boardWiseExamResults = Board_exam_result::where(['institute_id' => $inst_id])->get();
        if ($boardWiseExamResults->isEmpty()) {
            $toAddedBoardExamResults = [];
            foreach ($examList as $exam) {
                $toInsertArrBr = [];
                $toInsertArrBr['institute_id'] = $inst_id;
                $toInsertArrBr['exam_id'] = $exam['exam_id'];
                $toInsertArrBr['subject'] = $exam['subject'];
                array_push($toAddedBoardExamResults, $toInsertArrBr);
            }
            Board_exam_result::insert($toAddedBoardExamResults);
            try {
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Board Wise Result Table');
            }
            /*Now Return ALl Student Board_exam_result rows*/
            $boardWiseExamResults = Board_exam_result::where(['institute_id' => $inst_id])->get();
        }
        $data->boardWiseExamResults = $boardWiseExamResults;
        /*Group wise Board Result*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }


}
