<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 9:49 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ_degree_subjects;
use App\Models\Univ_degree_wise_stds;


class PublicStdThirdPageController extends Controller
{

    public function index($inst_id)
    {
        $data = new \stdClass();


        require_once app()->basePath('app').'/Helpers/LookUpJsonPubUnivStdThird.php';

        /*Univ_degree_wise_stds honors pass*/
        $data->univDegreeSubLists = $univDegreeSubLists;
        $univ_degree_wise_std_hnrs_pass = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->where(['degree_id'=>1])->orderby('subject_id')->get();
        if ($univ_degree_wise_std_hnrs_pass->isEmpty()) {
            $toAddDegreeStdData = [];
            foreach ($univDegHnrsPasLists as $univDegHnrsPasList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['degree_id'] = $univDegHnrsPasList['degree_id'];
                $toInsertArr['degree_name'] = $univDegHnrsPasList['degree_name'];
                $toInsertArr['subject_id'] = $univDegHnrsPasList['id'];
                $toInsertArr['subject_name'] = $univDegHnrsPasList['subject_name'];
                array_push($toAddDegreeStdData, $toInsertArr);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std_hnrs_pass = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->where(['degree_id'=>1])->orderby('subject_id')->get();
        }
        $data->univ_degree_wise_std_hnrs_pass = $univ_degree_wise_std_hnrs_pass;
        /*Univ_degree_wise_stds honors pass*/

        /*Univ_degree_wise_stds honors somman*/
        $univ_degree_wise_std_hnrs_som = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->where(['degree_id'=>2])->orderby('subject_id')->get();
        if ($univ_degree_wise_std_hnrs_som->isEmpty()) {
            $toAddDegreeStdHnrsSmData = [];
            foreach ($univDegHnrsSommanLists as $univDegHnrsSommanList) {
                $toInsertArrDgS = [];
                $toInsertArrDgS['institute_id'] = $inst_id;
                $toInsertArrDgS['degree_id'] = $univDegHnrsSommanList['degree_id'];
                $toInsertArrDgS['degree_name'] = $univDegHnrsSommanList['degree_name'];
                $toInsertArrDgS['subject_id'] = $univDegHnrsSommanList['id'];
                $toInsertArrDgS['subject_name'] = $univDegHnrsSommanList['subject_name'];
                array_push($toAddDegreeStdHnrsSmData, $toInsertArrDgS);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdHnrsSmData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std_hnrs_som = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->where(['degree_id'=>2])->orderby('subject_id')->get();
        }
        $data->univ_degree_wise_std_hnrs_som = $univ_degree_wise_std_hnrs_som;
        /*Univ_degree_wise_stds honors somman*/

        /*Univ_degree_wise_stds honors tec*/
        $univ_degree_wise_std_hnrs_tec = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->where(['degree_id'=>3])->orderby('subject_id')->get();
        if ($univ_degree_wise_std_hnrs_tec->isEmpty()) {
            $toAddDegreeStdHnrsTecData = [];
            foreach ($univDegreeTechLists as $univDegreeTechList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['degree_id'] = $univDegreeTechList['degree_id'];
                $toInsertArr['degree_name'] = $univDegreeTechList['degree_name'];
                $toInsertArr['subject_id'] = $univDegreeTechList['id'];
                $toInsertArr['subject_name'] = $univDegreeTechList['subject_name'];
                array_push($toAddDegreeStdHnrsTecData, $toInsertArr);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdHnrsTecData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std_hnrs_tec = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->where(['degree_id'=>3])->orderby('subject_id')->get();
        }
        $data->univ_degree_wise_std_hnrs_tec = $univ_degree_wise_std_hnrs_tec;
        /*Univ_degree_wise_stds honors tec*/

        /*Univ_degree_wise_stds masters*/
        $univ_degree_wise_std_mas = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->where(['degree_id'=>4])->orderby('subject_id')->get();
        if ($univ_degree_wise_std_mas->isEmpty()) {
            $toAddDegreeStdMasData = [];
            foreach ($univDegreeMasLists as $univDegreeMasList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['degree_id'] = $univDegreeMasList['degree_id'];
                $toInsertArr['degree_name'] = $univDegreeMasList['degree_name'];
                $toInsertArr['subject_id'] = $univDegreeMasList['id'];
                $toInsertArr['subject_name'] = $univDegreeMasList['subject_name'];
                array_push($toAddDegreeStdMasData, $toInsertArr);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdMasData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std_mas = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->where(['degree_id'=>4])->orderby('subject_id')->get();
        }
        $data->univ_degree_wise_std_mas = $univ_degree_wise_std_mas;
        /*Univ_degree_wise_stds masters*/

        /*Univ_degree_wise_stds masters tec*/
        $univ_degree_wise_std_mas_tec = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->where(['degree_id'=>5])->orderby('subject_id')->get();
        if ($univ_degree_wise_std_mas_tec->isEmpty()) {
            $toAddDegreeStdMasTecData = [];
            foreach ($univDegreeMasTecLists as $univDegreeMasTecList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['degree_id'] = $univDegreeMasTecList['degree_id'];
                $toInsertArr['degree_name'] = $univDegreeMasTecList['degree_name'];
                $toInsertArr['subject_id'] = $univDegreeMasTecList['id'];
                $toInsertArr['subject_name'] = $univDegreeMasTecList['subject_name'];
                array_push($toAddDegreeStdMasTecData, $toInsertArr);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdMasTecData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std_mas_tec = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->where(['degree_id'=>5])->orderby('subject_id')->get();
        }
        $data->univ_degree_wise_std_mas_tec = $univ_degree_wise_std_mas_tec;
        /*Univ_degree_wise_stds masters tec*/

        /*Univ_degree_wise_stds phd*/
        $univ_degree_wise_std_phd = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->where(['degree_id'=>6])->orderby('subject_id')->get();
        if ($univ_degree_wise_std_phd->isEmpty()) {
            $toAddDegreeStdPhdData = [];
            foreach ($univDegreePhdLists as $univDegreePhdList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['degree_id'] = $univDegreePhdList['degree_id'];
                $toInsertArr['degree_name'] = $univDegreePhdList['degree_name'];
                $toInsertArr['subject_id'] = $univDegreePhdList['id'];
                $toInsertArr['subject_name'] = $univDegreePhdList['subject_name'];
                array_push($toAddDegreeStdPhdData, $toInsertArr);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdPhdData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std_phd = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->where(['degree_id'=>6])->orderby('subject_id')->get();
        }
        $data->univ_degree_wise_std_phd = $univ_degree_wise_std_phd;
        /*Univ_degree_wise_stds phd*/

        /*Univ_degree_wise_stds diploma*/
        $univ_degree_wise_std_diploma = Univ_degree_wise_stds::where(['institute_id'=>$inst_id])->where(['degree_id'=>7])->orderby('subject_id')->get();
        if ($univ_degree_wise_std_diploma->isEmpty()) {
            $toAddDegreeStdDiplomaData = [];
            foreach ($univDegreeDiplomaLists as $univDegreeDiplomaList) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['degree_id'] = $univDegreeDiplomaList['degree_id'];
                $toInsertArr['degree_name'] = $univDegreeDiplomaList['degree_name'];
                $toInsertArr['subject_id'] = $univDegreeDiplomaList['id'];
                $toInsertArr['subject_name'] = $univDegreeDiplomaList['subject_name'];
                array_push($toAddDegreeStdDiplomaData, $toInsertArr);
            }
            try {
                Univ_degree_wise_stds::insert($toAddDegreeStdDiplomaData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save University Degree Wise Student Table');
            }

            /*Now Return ALl Univ_degree_wise_stds rows*/
            $univ_degree_wise_std_diploma = Univ_degree_wise_stds::where(['institute_id' => $inst_id])->where(['degree_id'=>7])->orderby('subject_id')->get();
        }
        $data->univ_degree_wise_std_diploma = $univ_degree_wise_std_diploma;
        /*Univ_degree_wise_stds diploama end*/


        return response()->json($data);
    }

}
