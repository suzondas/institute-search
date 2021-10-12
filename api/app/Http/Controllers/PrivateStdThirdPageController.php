<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 9:49 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Private_univ_degrees;
use App\Models\Pri_univ_courses;
use App\Models\Pri_univ_departments;
use App\Models\Univ_degree_wise_stds;
use App\Models\Univ_subject_std_dtls;
use App\Models\Univ_crs_wise_stds;

class PrivateStdThirdPageController extends Controller
{

    public function index($inst_id)
    {
        $data = new \stdClass();
        require_once app()->basePath('app').'/Helpers/LookUpJsonPrivUnivStdThird.php';

        /*Univ_degree_wise_stds  */
        $data->priUnivDegreeLists = $priUnivDegreeLists;
        $univ_degree_wise_std = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->orderby('degree_id')->get();
        if ($univ_degree_wise_std->isEmpty()) {
            $toAddDegreeStdData = [];
            foreach ($priUnivDegreeLists as $priUnivDegreeList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['degree_id'] = $priUnivDegreeList['degree_id'];
                $toInsertArr['degree_name'] = $priUnivDegreeList['degree_name'];
                array_push($toAddDegreeStdData, $toInsertArr);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->orderby('degree_id')->get();
        }
        $data->univ_degree_wise_std = $univ_degree_wise_std;
        /*Univ_degree_wise_stds  end*/

        /*Univ_subject_std_dtls hnrs*/
        $data->priUnivDepartmentLists = $priUnivDepartmentLists;
        $univ_subject_std_dtls = Univ_subject_std_dtls::where(['institute_id'=>$inst_id])->where(['degree_id'=>2])->orderby('dept_id')->get();
        if ($univ_subject_std_dtls->isEmpty()) {
            $toAddDeptStdData = [];
            foreach ($priUnivDepartmentLists as $priUnivDepartmentList) {
                $toInsertArrSb = [];
                $toInsertArrSb['institute_id'] = $inst_id;
                $toInsertArrSb['dept_id'] = $priUnivDepartmentList['dept_id'];
                $toInsertArrSb['dept_name'] = $priUnivDepartmentList['dept_name'];
                $toInsertArrSb['degree_id'] = '2';
                $toInsertArrSb['degree_name'] = 'স্নাতক (সম্মান)';
                array_push($toAddDeptStdData, $toInsertArrSb);
            }
            try {
                Univ_subject_std_dtls::insert($toAddDeptStdData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Department Wise Honours Student Data');
            }

            /*Now Return ALl Univ_subject_std_dtls rows*/
            $univ_subject_std_dtls = Univ_subject_std_dtls::where(['institute_id' => $inst_id])->where(['degree_id'=>2])->orderby('dept_id')->get();
        }
        $data->univ_subject_std_dtls = $univ_subject_std_dtls;
        /*Univ_subject_std_dtls hnrs end*/

        /*Univ_subject_std_dtls masters*/
        $univ_subject_std_dtls_mas = Univ_subject_std_dtls::where(['institute_id'=>$inst_id])->where(['degree_id'=>4])->orderby('dept_id')->get();
        if ($univ_subject_std_dtls_mas->isEmpty()) {
            $toAddDeptStdMasData = [];
            foreach ($priUnivDepartmentLists as $priUnivDepartmentList) {
                $toInsertArrDg = [];
                $toInsertArrDg['institute_id'] = $inst_id;
                $toInsertArrDg['dept_id'] = $priUnivDepartmentList['dept_id'];
                $toInsertArrDg['dept_name'] = $priUnivDepartmentList['dept_name'];
                $toInsertArrDg['degree_id'] = '4';
                $toInsertArrDg['degree_name'] = 'মাস্টার্স';
                array_push($toAddDeptStdMasData, $toInsertArrDg);
            }
            try {
                Univ_subject_std_dtls::insert($toAddDeptStdMasData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Department Wise Masters Student Data');
            }

            /*Now Return ALl Univ_subject_std_dtls rows*/
            $univ_subject_std_dtls_mas = Univ_subject_std_dtls::where(['institute_id' => $inst_id])->where(['degree_id'=>4])->orderby('dept_id')->get();
        }
        $data->univ_subject_std_dtls_mas = $univ_subject_std_dtls_mas;
        /*Univ_subject_std_dtls masters end*/

        /*Univ_crs_wise_stds*/
        $data->priUnivCrsLists = $priUnivCrsLists;
        $univ_crs_wise_stds = Univ_crs_wise_stds::where(['institute_id'=>$inst_id])->orderby('course_id')->get();
        if ($univ_crs_wise_stds->isEmpty()) {
            $toAddCrsStdData = [];
            foreach ($priUnivCrsLists as $priUnivCrsList) {
                $toInsertArrCrs = [];
                $toInsertArrCrs['institute_id'] = $inst_id;
                $toInsertArrCrs['course_id'] = $priUnivCrsList['course_id'];
                $toInsertArrCrs['course_name'] = $priUnivCrsList['course_name'];
                array_push($toAddCrsStdData, $toInsertArrCrs);
            }
            try {
                Univ_crs_wise_stds::insert($toAddCrsStdData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Course Wise Student Data');
            }

            /*Now Return ALl Univ_crs_wise_stds rows*/
            $univ_crs_wise_stds = Univ_crs_wise_stds::where(['institute_id' => $inst_id])->orderby('course_id')->get();
        }
        $data->univ_crs_wise_stds = $univ_crs_wise_stds;
        /*Univ_crs_wise_stds  end*/

        return response()->json($data);
    }

    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $univ_degree_wise_std = $data["univ_degree_wise_std"];
        $univ_subject_std_dtls = $data["univ_subject_std_dtls"];
        $univ_subject_std_dtls_mas = $data["univ_subject_std_dtls_mas"];
        $univ_crs_wise_stds = $data["univ_crs_wise_stds"];


        /*saving data Univ_degree_wise_stds*/
        try {
            Univ_degree_wise_stds::where('institute_id', $instId)->delete();
            Univ_degree_wise_stds::insert($univ_degree_wise_std);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data Univ_subject_std_dtls hnrs*/
        try {
            Univ_subject_std_dtls::where('institute_id', $instId)->where(['degree_id'=>2])->delete();
            Univ_subject_std_dtls::insert($univ_subject_std_dtls);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data Univ_subject_std_dtls masters*/
        try {
            Univ_subject_std_dtls::where('institute_id', $instId)->where(['degree_id'=>4])->delete();
            Univ_subject_std_dtls::insert($univ_subject_std_dtls_mas);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data Univ_crs_wise_stds*/
        try {
            Univ_crs_wise_stds::where('institute_id', $instId)->delete();
            Univ_crs_wise_stds::insert($univ_crs_wise_stds);
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
