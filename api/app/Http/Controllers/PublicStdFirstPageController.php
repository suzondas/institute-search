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

class PublicStdFirstPageController extends Controller
{
    public function index($inst_id){

        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonPubUnivStdFirst.php';

        /*Univ_students_summaries*/
//        $data->univSubLists = $univSubLists;
        $univ_students_summaries = Univ_students_summaries::where(['institute_id'=>$inst_id])->orderby('subject_name')->get();
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

}
