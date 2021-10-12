<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 1:12 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lookup_univ_subjects;
use App\Models\Univ_students_summaries;

class PrivateStdFirstPageController extends Controller
{
    public function index($inst_id)
    {

        $err = [];
        $data = new \stdClass();
        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonPubUnivStdFirst.php';

        /*Univ_students_summaries*/
//        $data->univSubLists = $univSubLists;
        $univ_students_summaries = Univ_students_summaries::where(['institute_id' => $inst_id])->orderby('subject_name')->get();
        if ($univ_students_summaries->isEmpty()) {
            $toAddStdData = [];
            foreach ($univSubLists as $univSubList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['subject_id'] = $univSubList['subject_id'];
                $toInsertArr['subject_name'] = $univSubList['subject_name'];
                array_push($toAddStdData, $toInsertArr);
            }
            try {
                Univ_students_summaries::insert($toAddStdData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Student Table');
            }

            /*Now Return ALl Univ_students_summaries rows*/
            $univ_students_summaries = Univ_students_summaries::where(['institute_id' => $inst_id])->orderby('subject_name')->get();
        }
        $data->univ_students_summaries = $univ_students_summaries;
        /*Univ_students_summaries  Ends*/

        return response()->json($data);
    }

    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $univ_students_summaries = $data["univ_students_summaries"];

        /*Validation Check starts*/
        $sumTotal = 0;
//        $sumFemale = 0;
        for ($i = 0; $i < sizeof($univ_students_summaries); $i++) {
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors1"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors2"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors3"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors4"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors5"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors6"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors7"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors8"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors9"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors10"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors11"];
            $sumTotal += (int)$univ_students_summaries[$i]["total_honors12"];
//            $sumFemale += $univ_students_summaries[$i]["female_honors1"];
        }
//        return response()->json($sumTotal);

        if ($sumTotal == 0) {
            return response()->json('শিক্ষার্থী তথ্য-১ পাতায় তথ্য প্রদান করুন', 500);
        }
        /*Validation Check Ends*/

        /*saving data $univ_students_summaries */
        try {
            Univ_students_summaries::where('institute_id', $instId)->delete();
            Univ_students_summaries::insert($univ_students_summaries);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }
}
