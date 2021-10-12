<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_category_student;
use App\Models\Lookup_disability;
use App\Models\Lookup_upajatis;
use App\Models\Yr_wise_sscvocs;
use App\Models\Categorywise_student_summary;
use App\Models\Institutes_special_student;
use App\Models\Categorywise_disable;
use App\Models\Categorywise_upajati;

class SchoolSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonSchoolSecond.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_sscvoc_id = 51;
        $data->sscVocClasses = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();

        foreach ($classesJsonData as $class) {
            if ($class['education_level_id'] == $edu_sscvoc_id) {
                array_push($data->sscVocClasses, $class);
            }

        }


        /*Education Level Wise Classes with Groups Fetching Ends*/
        //return response()->json($classesJsonData);

        $toInsertArr = [];

        /*SSC VOC Students */
        $sscVocStudentData = Yr_wise_sscvocs::where(['institute_id' => $inst_id])->orderBy('class_id','asc')->get();
        if ($sscVocStudentData->isEmpty()) {
            $toAddedSscVocData = [];
            foreach ($data->sscVocClasses as $class) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['education_level_id'] = $class['education_level_id'];
                $toInsertArr['class_id'] = $class['class_id'];
                array_push($toAddedSscVocData, $toInsertArr);
            }
            try {
                Yr_wise_sscvocs::insert($toAddedSscVocData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save SSC VOC Student Table');
            }
            /*Now Return SSC voc rows*/
            $sscVocStudentData = Yr_wise_sscvocs::where(['institute_id' => $inst_id])->orderBy('class_id','asc')->get();
        }
        $data->sscVocStudent = $sscVocStudentData;
        /*SSC VOC Students*/

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



    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $sscVocStudent = $data["sscVocStudent"];
        $instituteSpecialStudents = $data["instituteSpecialStudents"];
        $categoryWiseStudent = $data["categoryWiseStudent"];
        $categoryWiseDisableStudent = $data["categoryWiseDisableStudent"];
        $categoryWiseUpajati = $data["categoryWiseUpajati"];
        /*==================Parsing Table wise data from Array End=======*/

        /* saving Yr_wise_sscvocs */

        try {
            Yr_wise_sscvocs::where('INSTITUTE_ID', $instId)->delete();
            Yr_wise_sscvocs::insert($sscVocStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Categorywise_student_summary */

        try {
            Categorywise_student_summary::where('institute_id', $instId)->delete();
            Categorywise_student_summary::insert($categoryWiseStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data of Institutes_special_student */
        try {
            Institutes_special_student::where('id', $instituteSpecialStudents["id"])->update($instituteSpecialStudents);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Categorywise_disable */

        try {
            Categorywise_disable::where('institute_id', $instId)->delete();
            Categorywise_disable::insert($categoryWiseDisableStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Categorywise_upajati */

        try {
            Categorywise_upajati::where('institute_id', $instId)->delete();
            Categorywise_upajati::insert($categoryWiseUpajati);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }
}
