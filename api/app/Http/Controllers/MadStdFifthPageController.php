<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lookup_subjectdtl;
use App\Models\Subjectwise_student_summary;

class MadStdFifthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonMadFifth.php';

        /*Subject wise teacher student summery*/
        //$data->subjectList = Lookup_subjectdtl::where(['institute_type_id'=>2])->get();
        $subjectWiseData = Subjectwise_student_summary::where(['institute_id' => $inst_id])->orderBy('subject_id')->get();
        $data->subjectList = $subjectList;
        if ($subjectWiseData->isEmpty()) {
            $toAddsubjectWiseData = [];
            foreach ($data->subjectList as $subject) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['subject_id'] = $subject['subjectdtl_id'];
                array_push($toAddsubjectWiseData, $toInsertArr);
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

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }


}
