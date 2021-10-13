<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 1:12 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ_designations;
use App\Models\Univ_desig_wise_teachers;
use App\Models\Univ_rsdnt_ws_teachers;
use App\Models\Univ_teachers_staff_summaries;

class PublicTeachThirdPageController extends Controller
{
    public function index($inst_id){

        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonPubUnivTeach.php';

        /*Univ_desig_wise_teachers*/
        $data->univDesigAll = $univDesigAllLists;
        $univ_desig_wise_teachers = Univ_desig_wise_teachers::where(['institute_id'=>$inst_id])->orderby('designation_id')->get();
        if ($univ_desig_wise_teachers->isEmpty()) {
            $toAdDesigWsTeacherData = [];
            foreach ($univDesigLists as $univDesigList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['designation_id'] = $univDesigList['designation_id'];
                array_push($toAdDesigWsTeacherData, $toInsertArr);
            }
            try {
                Univ_desig_wise_teachers::insert($toAdDesigWsTeacherData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Designation Wise Teacher Data');
            }

            /*Now Return ALl Univ_desig_wise_teachers rows*/
            $univ_desig_wise_teachers = Univ_desig_wise_teachers::where(['institute_id' => $inst_id])->orderby('designation_id')->get();
        }
        $data->univ_desig_wise_teachers = $univ_desig_wise_teachers;
        /*Univ_desig_wise_teachers  Ends*/

        /*Univ_rsdnt_ws_teachers*/
        $univ_rsdnt_ws_teachers = Univ_rsdnt_ws_teachers::where(['institute_id'=>$inst_id])->orderby('designation_id')->get();
        if ($univ_rsdnt_ws_teachers->isEmpty()) {
            $toAdResWsTeacherData = [];
            foreach ($univDesigResidentLists as $univDesigResidentList) {
                $toInsertArrRs = [];
                $toInsertArrRs['institute_id'] = $inst_id;
                $toInsertArrRs['designation_id'] = $univDesigResidentList['designation_id'];
                array_push($toAdResWsTeacherData, $toInsertArrRs);
            }
            try {
                Univ_rsdnt_ws_teachers::insert($toAdResWsTeacherData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Resident Wise Teacher Data');
            }

            /*Now Return ALl Univ_rsdnt_ws_teachers rows*/
            $univ_rsdnt_ws_teachers = Univ_rsdnt_ws_teachers::where(['institute_id' => $inst_id])->orderby('designation_id')->get();
        }
        $data->univ_rsdnt_ws_teachers = $univ_rsdnt_ws_teachers;
        /*Univ_rsdnt_ws_teachers  Ends*/

        /*Univ_teachers_staff_summaries*/
        $univ_teachers_staff_summaries = Univ_teachers_staff_summaries::where(['institute_id'=>$inst_id])->orderby('designation_id')->get();
        if ($univ_teachers_staff_summaries->isEmpty()) {
            $toAdTeacherStaffData = [];
            foreach ($univDesigStaffLists as $univDesigStaffList) {
                $toInsertArrTs = [];
                $toInsertArrTs['institute_id'] = $inst_id;
                $toInsertArrTs['designation_id'] = $univDesigStaffList['designation_id'];
                array_push($toAdTeacherStaffData, $toInsertArrTs);
            }
            try {
                Univ_teachers_staff_summaries::insert($toAdTeacherStaffData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Resident Wise Teacher Data');
            }

            /*Now Return ALl Univ_rsdnt_ws_teachers rows*/
            $univ_teachers_staff_summaries = Univ_teachers_staff_summaries::where(['institute_id' => $inst_id])->orderby('designation_id')->get();
        }
        $data->univ_teachers_staff_summaries = $univ_teachers_staff_summaries;
        /*Univ_teachers_staff_summaries  Ends*/

        return response()->json($data);
    }
}
