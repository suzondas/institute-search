<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_category_student;
use App\Models\Lookup_disability;
use App\Models\Lookup_upajatis;
use App\Models\Categorywise_student_summary;
use App\Models\Categorywise_disable;
use App\Models\Categorywise_upajati;
use App\Models\Institutes_special_student;

class TecStdFifthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        $toInsertArr = [];

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonTecFifth.php';

        /*Inst Special Need*/
        $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        if(empty($instSpecialInfo)){
            $toInsertArr['institute_id'] = $inst_id;
            Institutes_special_student::insert($toInsertArr);
            $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        }
        $data->instituteSpecialStudents = $instSpecialInfo;
        /*Institutes_special_student*/

        /*Category Wise Students */
        //$data->categoryWiseList = Lookup_category_student::all();
        $data->categoryWiseList = $categoryWiseList;
        $categoryWiseStudentData = Categorywise_student_summary::where(['institute_id' => $inst_id])->get();
        if ($categoryWiseStudentData->isEmpty()) {
            $toAddedCategoryWiseData = [];
            foreach ($categoryWiseList as $category) {
                $toInsertArrCt = [];
                $toInsertArrCt['institute_id'] = $inst_id;
                $toInsertArrCt['category_id'] = $category['category_id'];
                array_push($toAddedCategoryWiseData, $toInsertArrCt);
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

        /*Upajati */
        // $data->upajatiList=Lookup_upajatis::all();
        $data->upajatiList=$upajatiList;
        $categoryWiseUpajatiData = Categorywise_upajati::where(['institute_id' => $inst_id])->get();
        if ($categoryWiseUpajatiData->isEmpty()) {
            $toAddedCategoryWiseUpajatiData = [];
            foreach ($upajatiList as $upajati) {
                $toInsertArrUp = [];
                $toInsertArrUp['institute_id'] = $inst_id;
                $toInsertArrUp['upajati_id'] = $upajati['upajati_id'];
                array_push($toAddedCategoryWiseUpajatiData, $toInsertArrUp);
            }
            try {
                Categorywise_upajati::insert($toAddedCategoryWiseUpajatiData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Category Wise Upajati Table');
            }
            /*Now Return Category Wise Upajati rows*/
            $categoryWiseUpajatiData = Categorywise_upajati::where(['institute_id' => $inst_id])->get();
        }
        $data->categoryWiseUpajati = $categoryWiseUpajatiData;
        /*Upajati*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

}
