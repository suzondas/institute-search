<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/31/2021
 * Time: 12:03 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lookup_univ_subjects;
use App\Models\Univ_dpt_teachers;

class PrivateTeachFirstPageController extends Controller
{
    public function index($inst_id){

        $err = [];
        $data = new \stdClass();
        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonPubUnivStdFirst.php';

        /*Univ_students_summaries*/
        $data->univSubLists = $univSubLists;
        $univ_dpt_teachers = Univ_dpt_teachers::where(['institute_id'=>$inst_id])->orderby('subject_name')->get();
        if ($univ_dpt_teachers->isEmpty()) {
            $toAdTeacherData = [];
            foreach ($univSubLists as $univSubList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['subject_id'] = $univSubList['subject_id'];
                $toInsertArr['subject_name'] = $univSubList['subject_name'];
                array_push($toAdTeacherData, $toInsertArr);
            }
            try {
                Univ_dpt_teachers::insert($toAdTeacherData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Teacher Table');
            }

            /*Now Return ALl Univ_dpt_teachers rows*/
            $univ_dpt_teachers = Univ_dpt_teachers::where(['institute_id' => $inst_id])->orderby('subject_name')->get();
        }
        $data->univ_dpt_teachers = $univ_dpt_teachers;
        /*Univ_students_summaries  Ends*/

        return response()->json($data);
    }

    public function submitData(Request $request){
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $univ_dpt_teachers=$data["univ_dpt_teachers"];

/* Validation for Teachers starts*/
        $sumTotal = 0;
//        $sumFemale = 0;
        for ($i = 0; $i < sizeof($univ_dpt_teachers); $i++) {
            $sumTotal += (int)$univ_dpt_teachers[$i]["total_prof"];
            $sumTotal += (int)$univ_dpt_teachers[$i]["total_asso_prof"];
            $sumTotal += (int)$univ_dpt_teachers[$i]["total_assit_prof"];
            $sumTotal += (int)$univ_dpt_teachers[$i]["total_lecturer"];
//            $sumFemale += $univ_students_summaries[$i]["female_honors1"];
        }
//        return response()->json($sumTotal);

        if ($sumTotal == 0) {
            return response()->json('Please Provide Teacher Numbers', 500);
        }
        /* Validation for Teachers ends*/


        /*saving data Univ_dpt_teachers */
        try {
            Univ_dpt_teachers::where('institute_id', $instId)->delete();
            Univ_dpt_teachers::insert($univ_dpt_teachers);
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
