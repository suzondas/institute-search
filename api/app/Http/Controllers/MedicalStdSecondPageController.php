<?php

namespace App\Http\Controllers;

use App\Models\Med_teac_staff_summary;
use Illuminate\Http\Request;
use App\Models\teacher_quali_summary;
use App\Models\Teachers_train_others_infos;
use App\Models\Teachers_retire_award_infos;

class MedicalStdSecondPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        $toInsertArr = [];
        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonMedSnd.php';

        $data->desigList= $desigList;
        $teachStafSum = Med_teac_staff_summary::where(['institute_id' => $inst_id])->orderby('id')->get();
        if ($teachStafSum->isEmpty()) {
            $toAddedteachStafSum = [];
            foreach ($desigList as $desig) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['designation_id'] = $desig['designation_id'];
                array_push($toAddedteachStafSum, $toInsertArr);
            }
            try {
                Med_teac_staff_summary::insert($toAddedteachStafSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Teachers_staff_summary Table');
            }
            /*Now Return Teachers_staff_summary rows*/
            $teachStafSum = Med_teac_staff_summary::where(['institute_id' => $inst_id])->orderby('id')->get();
        }
        $data->teachStafSum = $teachStafSum;
        /*Teachers_staff_summary*/

        /*Teachers_train_others_infos*/
        $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first([
            'id',
            'institute_id',
            'training_required1',
            'training_required2',
            'training_required3',
            'training_required4',
            'autism_guide_teacher_yn'
        ]);
        if (empty($teacherTrainInfo)) {
            $toInsertArrTr['institute_id'] = $inst_id;
            Teachers_train_others_infos::insert($toInsertArrTr);
            $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first([
                'id',
                'institute_id',
                'training_required1',
                'training_required2',
                'training_required3',
                'training_required4',
                'autism_guide_teacher_yn'
            ]);
        }
        $data->teacherTrainInfo = $teacherTrainInfo;
        /*Teachers_train_others_infos*/

        $data->qualiList= $qualiList;
        $teachQualiSum = teacher_quali_summary::where(['institute_id' => $inst_id])->get();
        if ($teachQualiSum->isEmpty()) {
        $toAddedteachQualiSum = [];
        foreach ($qualiList as $quali) {
            $toInsertArrQl = [];
            $toInsertArrQl['institute_id'] = $inst_id;
            $toInsertArrQl['quli_id'] = $quali['id'];
            array_push($toAddedteachQualiSum, $toInsertArrQl);
        }
        try {
            teacher_quali_summary::insert($toAddedteachQualiSum);
        } catch (\Exception $e) {
            array_push($err, 'Could Not Save teacher_quali_summary Table');
        }
        /*Now Return teacher_quali_summary rows*/
        $teachQualiSum = teacher_quali_summary::where(['institute_id' => $inst_id])->get();
    }
        $data->teachQualiSum = $teachQualiSum;
        /*teacher_quali_summary*/

        /*Teachers_retire_award_infos*/
        $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first([
            'id',
            'institute_id',
            'retired_teacher_total',
            'rerired_teacher_female',
            'retiredfu_teacher_total',
            'reriredfu_teacher_female'
        ]);
        if (empty($teacherRetAwInfo)) {
            $toInsertArrRf['institute_id'] = $inst_id;
            Teachers_retire_award_infos::insert($toInsertArrRf);
            $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first([
                'id',
                'institute_id',
                'retired_teacher_total',
                'rerired_teacher_female',
                'retiredfu_teacher_total',
                'reriredfu_teacher_female'
            ]);
        }
        $data->teacherRetAwInfo = $teacherRetAwInfo;
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
        $teacherTrainInfo= $data["teacherTrainInfo"];

        /*==================Parsing Table wise data from Array End=======*/

        /* saving teacher_quali_summary */

        try {
            teacher_quali_summary::where('institute_id', $instId)->delete();
            teacher_quali_summary::insert($teachQualiSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving teacher_staff_summary */

        try {
            Med_teac_staff_summary::where('institute_id', $instId)->delete();
            Med_teac_staff_summary::insert($teachStafSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }


        /*saving data of Teachers_retire_award_infos */
        try {

            Teachers_retire_award_infos::where('id', $teacherRetAwInfo["id"])->update([
                'retired_teacher_total'=>$teacherRetAwInfo['retired_teacher_total'],
                'rerired_teacher_female'=>$teacherRetAwInfo['rerired_teacher_female'],
                'retiredfu_teacher_total'=>$teacherRetAwInfo['retiredfu_teacher_total'],
                'reriredfu_teacher_female'=>$teacherRetAwInfo['reriredfu_teacher_female']
            ]);

        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /*Teacher Training info teacherTrainInfo*/
        try{

            Teachers_train_others_infos:: where('id',$teacherTrainInfo["id"])->update([
                'training_required1'=>$teacherTrainInfo['training_required1'],
                'training_required2'=>$teacherTrainInfo['training_required2'],
                'training_required3'=>$teacherTrainInfo['training_required3'],
                'training_required4'=>$teacherTrainInfo['training_required4'],
                'autism_guide_teacher_yn'=>$teacherTrainInfo['autism_guide_teacher_yn']
            ]);
        }
        catch(\Exception $e){
            array_push($err, $e);
        }

        return response($err);
    }
}
