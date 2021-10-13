<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designations_college;
use App\Models\Lookup_designation_vocs;
use App\Models\Lookup_teachers_qualifications;
use App\Models\Lookup_hd_training;
use App\Models\Teachers_staff_summaries;
use App\Models\Technical_teachers_summaries;
use App\Models\Teacher_quali_summary;
use App\Models\Higher_degree_teachers;
use App\Models\Teachers_higher_edu_trainings;
use App\Models\Teachers_inservice_trainings;
use App\Models\Teachers_train_others_infos;
use App\Models\Teachers_retire_award_infos;
use App\Models\Submission_infos;


class CollegeFifthPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonCollegeFifth.php';

        /*Teachers_staff_summary*/
        //$data->desigList= Designations_college::whereNotNull('desig_id')->orderBy('desig_id')->get();
        $data->desigList = $desigList;
        $teachStafSum = Teachers_staff_summaries::where(['institute_id' => $inst_id])->orderby('id')->get();
        if ($teachStafSum->isEmpty()) {
            $toAddedteachStafSum = [];
            foreach ($desigList as $desig) {
                $toInsertArrDes = [];
                $toInsertArrDes['institute_id'] = $inst_id;
                $toInsertArrDes['designation_id'] = $desig['designation_id'];
                array_push($toAddedteachStafSum, $toInsertArrDes);
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

        /*Technical_teachers_summary*/
        //$data->desigVocList= Lookup_designation_vocs::orderBy('desig_id')->get();
        $data->desigVocList = $desigVocList;
        $teachVocStafSum = Technical_teachers_summaries::where(['institute_id' => $inst_id])->get();
        if ($teachVocStafSum->isEmpty()) {
            $toAddedteachVocStafSum = [];
            foreach ($desigVocList as $desig) {
                $toInsertArrDvt = [];
                $toInsertArrDvt['institute_id'] = $inst_id;
                $toInsertArrDvt['designation_id'] = $desig['designation_id'];
                array_push($toAddedteachVocStafSum, $toInsertArrDvt);
            }
            try {
                Technical_teachers_summaries::insert($toAddedteachVocStafSum);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Technical_teachers_summary Table');
            }
            /*Now Return Technical_teachers_summaries rows*/
            $teachVocStafSum = Technical_teachers_summaries::where(['institute_id' => $inst_id])->get();
        }
        $data->teachVocStafSum = $teachVocStafSum;
        /*Technical_teachers_summary*/

        /*Teacher_quali_summary*/
        //$data->qualiList= Lookup_teachers_qualifications::orderBy('id')->get();
        $data->qualiList = $qualiList;
        $teachQualiSum = Teacher_quali_summary::where(['institute_id' => $inst_id])->get();
        if ($teachQualiSum->isEmpty()) {
            $toAddedteachQualiSum = [];
            foreach ($qualiList as $quali) {
                $toInsertArrQl = [];
                $toInsertArrQl['institute_id'] = $inst_id;
                $toInsertArrQl['quli_id'] = $quali['id'];
                array_push($toAddedteachQualiSum, $toInsertArrQl);
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
        $data->hdList = $hdList;
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
        $data->hdTrList = $hdTrList;
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
            $toInsertArr['institute_id'] = $inst_id;
            Teachers_inservice_trainings::insert($toInsertArr);
            $teacherInservTr = Teachers_inservice_trainings::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherInservTr = $teacherInservTr;
        /*Teachers_inservice_trainings*/

        /*Teachers_train_others_infos*/
        $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first();
        if (empty($teacherTrainInfo)) {
            $toInsertArr['institute_id'] = $inst_id;
            Teachers_train_others_infos::insert($toInsertArr);
            $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherTrainInfo = $teacherTrainInfo;
        /*Teachers_train_others_infos*/

        /*Teachers_retire_award_infos*/
        $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first();
        if (empty($teacherRetAwInfo)) {
            $toInsertArr['institute_id'] = $inst_id;
            Teachers_retire_award_infos::insert($toInsertArr);
            $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherRetAwInfo = $teacherRetAwInfo;
        /*Teachers_retire_award_infos*/

        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }





}
