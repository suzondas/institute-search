<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board_exam_result;
use App\Models\Teachers_staff_summaries;
use App\Models\Designations_tecs;
use App\Models\Submission_infos;

class TecStdSeventhPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonTecSeven.php';

        /*Group wise Board Result*/
        $data->examLevel = $examLevel;
        $boardWiseExamResults = Board_exam_result::where(['institute_id' => $inst_id])->get();
        if ($boardWiseExamResults->isEmpty()) {
            $toAddedBoardExamResults = [];
            foreach ($examList as $exam) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['exam_id'] = $exam['exam_id'];
                $toInsertArr['subject'] = $exam['subject'];
                array_push($toAddedBoardExamResults, $toInsertArr);
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

        /*Teachers_staff_summary*/
        // $data->desigList= Designations_tecs::orderBy('DESIG_CODE','ASC')->get();
        $data->desigList= $desigList;
        $teachStafSum = Teachers_staff_summaries::where(['institute_id' => $inst_id])->orderby('id')->get();
        if ($teachStafSum->isEmpty()) {
            $toAddedteachStafSum = [];
            foreach ($desigList as $desig) {
                $toInsertArrTs = [];
                $toInsertArrTs['institute_id'] = $inst_id;
                $toInsertArrTs['designation_id'] = $desig['designation_id'];
                array_push($toAddedteachStafSum, $toInsertArrTs);
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
        $boardWiseExamResults = $data["boardWiseExamResults"];
        $teachStafSum = $data["teachStafSum"];
        /*==================Parsing Table wise data from Array End=======*/

        /* saving Board_exam_result */

        try {
            Board_exam_result::where('institute_id', $instId)->delete();
            Board_exam_result::insert($boardWiseExamResults);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Teachers_staff_summaries */

        try {
            Teachers_staff_summaries::where('institute_id', $instId)->delete();
            Teachers_staff_summaries::insert($teachStafSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->tec_7th_page = 1;
                $row->updated_at = time();
                $row->save();
                return response()->json("success", 200);
            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
                return response()->json($err, 500);
            }
        }
    }
}
