<?php

namespace App\Http\Controllers;

use App\Models\Medical_categorywise_disable;
use App\Models\Medical_students_summary;
use App\Models\Medical_subject_std_summary;
use Illuminate\Http\Request;

class MedicalStdFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonMedicalFirst.php';

        /*students summary Subject Wise*/
        $medicalSubStdSum = Medical_subject_std_summary::where(['institute_id' => $inst_id])->first();
        if ($medicalSubStdSum===null) {
            $toInsSubStdSum['institute_id'] = $inst_id;
            try {
                Medical_subject_std_summary::insert($toInsSubStdSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Medical Subject Students Table');
            }
            /*Now return inserted data*/
            $medicalSubStdSum = Medical_subject_std_summary::where(['institute_id' => $inst_id])->first();
        }
        $data->medicalSubStdSum = $medicalSubStdSum;
        /*students summary Subject Wise*/

        /*students summary*/
        $medicalStudentSum = Medical_students_summary::where(['institute_id' => $inst_id])->first();
        if ($medicalStudentSum===null) {
            $toInsertArr['institute_id'] = $inst_id;
            try {
                Medical_students_summary::insert($toInsertArr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Medical Student Table');
            }
            /*Now return inserted data*/
            $medicalStudentSum = Medical_students_summary::where(['institute_id' => $inst_id])->first();
        }
        $data->medicalStdSum = $medicalStudentSum;
        /*students summary*/


        /*Category Wise Disable Students */;
        $data->disableCategory = $disableCategory;
        $categoryWiseDisable = Medical_categorywise_disable::where(['institute_id' => $inst_id])->get();
        if ($categoryWiseDisable->isEmpty()) {
            $toAddedCategoryWiseDisable = [];
            foreach ($disableCategory as $category) {
                $toInsertArrDc = [];
                $toInsertArrDc['institute_id'] = $inst_id;
                $toInsertArrDc['disable_type'] = $category['disable_type'];
                array_push($toAddedCategoryWiseDisable, $toInsertArrDc);
            }
            try {
                Medical_categorywise_disable::insert($toAddedCategoryWiseDisable);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Category Wise Disable Student Table');
            }
            /*Now Return Category Wise Disable rows*/
            $categoryWiseDisable = Medical_categorywise_disable::where(['institute_id' => $inst_id])->get();
        }
        $data->categoryWiseDisableStudent = $categoryWiseDisable;
        /*Category Wise Disable Students*/


        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

}
