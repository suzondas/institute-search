<?php

namespace App\Http\Controllers;

use App\Models\Submission_infos;
use Illuminate\Http\Request;
use App\Models\Designations_engs;
use App\Models\Teachers_staff_summaries;



class EngTeacherFirstPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpEngTeachFirst.php';

        /*Teachers_staff_summary*/
        //$data->desigList= Designations_engs::orderBy('eng_sl')->get();
        //return response()->json($data->desigList);
        $data->desigList = $desigList;
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
        $teachStafSum = $data["teachStafSum"];
        /*==================Parsing Table wise data from Array End=======*/

        /* saving Teacher staff summaries */
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
                $row->english_3rd_page = 1;
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
