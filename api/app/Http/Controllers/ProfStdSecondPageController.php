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
}
