<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher_quali_summary;
use App\Models\Teachers_retire_award_infos;
use App\Models\Teachers_staff_summaries;

class ProfStdFourthPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        $toInsertArr = [];
        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonProfFourth.php';

        /*Teacher_quali_summary*/
       // $data->qualiList= Lookup_teachers_qualifications::orderBy('id')->get();
       // return response()->json($data);

        /*Teachers_staff_summary*/
       //  $data->desigList= Designations_tecs::orderBy('DESIG_CODE','ASC')->get();
         //return response()->json($data);

        $data->desigList= $desigList;
        $teachStafSum = Teachers_staff_summaries::where(['institute_id' => $inst_id])->orderby('id')->get();
        if ($teachStafSum->isEmpty()) {
            $toAddedteachStafSum = [];
            foreach ($desigList as $desig) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['designation_id'] = $desig['designation_id'];
                array_push($toAddedteachStafSum, $toInsertArr);
            }
            try {
                Teachers_staff_summaries::insert($toAddedteachStafSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Teachers_staff_summary Table');
            }
            /*Now Return Teachers_staff_summary rows*/
            $teachStafSum = Teachers_staff_summaries::where(['institute_id' => $inst_id])->orderby('id')->get();
        }
        $data->teachStafSum = $teachStafSum;
        /*Teachers_staff_summary*/
        $data->qualiList= $qualiList;
        $teachQualiSum = Teacher_quali_summary::where(['institute_id' => $inst_id])->get();
        if ($teachQualiSum->isEmpty()) {
            $toAddedteachQualiSum = [];
            foreach ($qualiList as $quali) {
                $toInsertArrQl = [];
                $toInsertArrQl['institute_id'] = $inst_id;
                $toInsertArrQl['quli_id'] = $quali['id'];
                array_push($toAddedteachQualiSum, $toInsertArrQl);
            }
            try {
                Teacher_quali_summary::insert($toAddedteachQualiSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Teacher_quali_summary Table');
            }
            /*Now Return Teacher_quali_summary rows*/
            $teachQualiSum = Teacher_quali_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->teachQualiSum = $teachQualiSum;
        /*Teacher_quali_summary*/


        /*Teachers_retire_award_infos*/
        $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first();
        if (empty($teacherRetAwInfo)) {
            $toInsertArrRet['institute_id'] = $inst_id;
            Teachers_retire_award_infos::insert($toInsertArrRet);
            $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherRetAwInfo= $teacherRetAwInfo;
        /*Teachers_retire_award_infos*/

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
        $teachQualiSum = $data["teachQualiSum"];
        $teachStafSum = $data["teachStafSum"];
        $teacherRetAwInfo = $data["teacherRetAwInfo"];

        /*==================Parsing Table wise data from Array End=======*/

        /* saving Teacher_quali_summary */

        try {
            Teacher_quali_summary::where('institute_id', $instId)->delete();
            Teacher_quali_summary::insert($teachQualiSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving teacher_staff_summary */

        try {
            Teachers_staff_summaries::where('institute_id', $instId)->delete();
            Teachers_staff_summaries::insert($teachStafSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }


        /*saving data of Teachers_retire_award_infos */
        try {
            Teachers_retire_award_infos::where('id', $teacherRetAwInfo["id"])->update($teacherRetAwInfo);

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
