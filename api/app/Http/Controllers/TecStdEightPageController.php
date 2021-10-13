<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lookup_teachers_qualifications;
use App\Models\Teacher_quali_summary;
use App\Models\Lookup_hd_training;
use App\Models\Higher_degree_teachers;
use App\Models\Teachers_higher_edu_trainings;
use App\Models\Teachers_inservice_trainings;
use App\Models\Teachers_train_others_infos;
use App\Models\Teachers_retire_award_infos;



class TecStdEightPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        $toInsertArr = [];
        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonTecEight.php';

        /*Teacher_quali_summary*/
        //$data->qualiList= Lookup_teachers_qualifications::orderBy('id')->get();
        $data->qualiList= $qualiList;
        $teachQualiSum = Teacher_quali_summary::where(['institute_id' => $inst_id])->get();
        if ($teachQualiSum->isEmpty()) {
            $toAddedteachQualiSum = [];
            foreach ($qualiList as $quali) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['quli_id'] = $quali['id'];
                array_push($toAddedteachQualiSum, $toInsertArr);
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

        /*Higher_degree_teachers*/
        //$data->hdList= Lookup_hd_training::wherein('higher_degree_id', array(4,5,6,7))->orderBy('higher_degree_id')->get();
        $data->hdList= $hdList;
        $hdTeachSum = Higher_degree_teachers::where(['institute_id' => $inst_id])->get();
        if ($hdTeachSum->isEmpty()) {
            $toAddedhdTeachSum = [];
            foreach ($hdList as $hdVal) {
                $toInsertArrHdt = [];
                $toInsertArrHdt['institute_id'] = $inst_id;
                $toInsertArrHdt['higher_degree_id'] = $hdVal['higher_degree_id'];
                array_push($toAddedhdTeachSum, $toInsertArrHdt);
            }
            try {
                Higher_degree_teachers::insert($toAddedhdTeachSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Higher_degree_teachers Table');
            }
            /*Now Return Higher_degree_teachers rows*/
            $hdTeachSum = Higher_degree_teachers::where(['institute_id' => $inst_id])->get();
        }
        $data->hdTeachSum = $hdTeachSum;
        /*Higher_degree_teachers*/

        /*Teachers_higher_edu_trainings*/
        //$data->hdTrList= Lookup_hd_training::wherein('higher_degree_id', array(91,92,93,94,95,96))->orderBy('higher_degree_id')->get();
        $data->hdTrList= $hdTrList;
        $hdTrnSum = Teachers_higher_edu_trainings::where(['institute_id' => $inst_id])->get();
        if ($hdTrnSum->isEmpty()) {
            $toAddedhdTrnSum = [];
            foreach ($hdTrList as $hdVal) {
                $toInsertArrHd = [];
                $toInsertArrHd['institute_id'] = $inst_id;
                $toInsertArrHd['higher_degree_id'] = $hdVal['higher_degree_id'];
                array_push($toAddedhdTrnSum, $toInsertArrHd);
            }
            try {
                Teachers_higher_edu_trainings::insert($toAddedhdTrnSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Higher_degree_teachers Table');
            }
            /*Now Return Higher_degree_teachers rows*/
            $hdTrnSum = Teachers_higher_edu_trainings::where(['institute_id' => $inst_id])->get();
        }
        $data->hdTrnSum = $hdTrnSum;
        /*Teachers_higher_edu_trainings*/

        /*Teachers_inservice_trainings*/
        $teacherInservTr = Teachers_inservice_trainings::where(['institute_id' => $inst_id])->first();
        if (empty($teacherInservTr)) {
            $toInsertArrTsr['institute_id'] = $inst_id;
            Teachers_inservice_trainings::insert($toInsertArrTsr);
            $teacherInservTr = Teachers_inservice_trainings::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherInservTr= $teacherInservTr;
        /*Teachers_inservice_trainings*/

        /*Teachers_train_others_infos*/
        $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first();
        if (empty($teacherTrainInfo)) {
            $toInsertArrTof['institute_id'] = $inst_id;
            Teachers_train_others_infos::insert($toInsertArrTof);
            $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherTrainInfo= $teacherTrainInfo;
        /*Teachers_train_others_infos*/

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

}
