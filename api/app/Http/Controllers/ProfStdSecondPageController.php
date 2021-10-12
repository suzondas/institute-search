<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorywise_disable;
use App\Models\Institutes_special_student;

class ProfStdSecondPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        $toInsertArr = [];

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonProfSecond.php';

        /*Inst Special Need*/
        $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        if(empty($instSpecialInfo)){
            $toInsertArr['institute_id'] = $inst_id;
            Institutes_special_student::insert($toInsertArr);
            $instSpecialInfo = Institutes_special_student::where(['institute_id' => $inst_id])->first();
        }
        $data->instituteSpecialStudents = $instSpecialInfo;
        /*Institutes_special_student*/

        /*Category Wise Disable Students */
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
        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $instituteSpecialStudents = $data["instituteSpecialStudents"];
        $categoryWiseDisableStudent = $data["categoryWiseDisableStudent"];
        /*==================Parsing Table wise data from Array End=======*/

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
        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }
}
