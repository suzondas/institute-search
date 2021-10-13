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


}
