<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachers_staff_summaries;
use App\Models\Technical_teachers_summaries;
use App\Models\Designations_college;
use App\Models\Lookup_designation_vocs;
use App\Models\Lookup_teachers_qualifications;
use App\Models\Teacher_quali_summary;
use App\Models\Lookup_hd_training;
use App\Models\Higher_degree_teachers;
use App\Models\Teachers_higher_edu_trainings;
use App\Models\Teachers_inservice_trainings;
use App\Models\Teachers_train_others_infos;
use App\Models\Teachers_retire_award_infos;
use App\Models\Designations_sch_cols;

use App\Models\Submission_infos;
class SnCSixPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        $toInsertArr = [];
        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonSnCSix.php';

        /*Teachers_staff_summary*/
        //$data->desigList= Designations_sch_cols::orderBy('desig_id','ASC')->get();
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

        /*Technical_teachers_summary*/
        //$data->desigVocList= Lookup_designation_vocs::orderBy('desig_id')->get();
        $data->desigVocList = $desigVocList;
        $teachVocStafSum = Technical_teachers_summaries::where(['institute_id' => $inst_id])->get();
        if ($teachVocStafSum->isEmpty()) {
            $toAddedteachVocStafSum = [];
            foreach ($desigVocList as $desig) {
                $toInsertArrDsv = [];
                $toInsertArrDsv['institute_id'] = $inst_id;
                $toInsertArrDsv['designation_id'] = $desig['designation_id'];
                array_push($toAddedteachVocStafSum, $toInsertArrDsv);
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
            $toInsertArrTsr['institute_id'] = $inst_id;
            Teachers_inservice_trainings::insert($toInsertArrTsr);
            $teacherInservTr = Teachers_inservice_trainings::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherInservTr = $teacherInservTr;
        /*Teachers_inservice_trainings*/

        /*Teachers_train_others_infos*/
        $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first();
        if (empty($teacherTrainInfo)) {
            $toInsertArrTif['institute_id'] = $inst_id;
            Teachers_train_others_infos::insert($toInsertArrTif);
            $teacherTrainInfo = Teachers_train_others_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherTrainInfo = $teacherTrainInfo;
        /*Teachers_train_others_infos*/

        /*Teachers_retire_award_infos*/
        $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first();
        if (empty($teacherRetAwInfo)) {
            $toInsertArrRet['institute_id'] = $inst_id;
            Teachers_retire_award_infos::insert($toInsertArrRet);
            $teacherRetAwInfo = Teachers_retire_award_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->teacherRetAwInfo = $teacherRetAwInfo;
        /*Teachers_retire_award_infos*/

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
        $teachVocStafSum = $data["teachVocStafSum"];
        $teachQualiSum = $data["teachQualiSum"];
        $hdTeachSum = $data["hdTeachSum"];
        $hdTrnSum = $data["hdTrnSum"];
        $teacherInservTr = $data["teacherInservTr"];
        $teacherTrainInfo = $data["teacherTrainInfo"];
        $teacherRetAwInfo = $data["teacherRetAwInfo"];
        /*==================Parsing Table wise data from Array End=======*/

        /* saving Teachers_staff_summaries */

        try {
            Teachers_staff_summaries::where('institute_id', $instId)->delete();
            Teachers_staff_summaries::insert($teachStafSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Technical_teachers_summaries */

        try {
            Technical_teachers_summaries::where('institute_id', $instId)->delete();
            Technical_teachers_summaries::insert($teachVocStafSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Teacher_quali_summary */

        try {
            Teacher_quali_summary::where('institute_id', $instId)->delete();
            Teacher_quali_summary::insert($teachQualiSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Higher_degree_teachers */

        try {
            Higher_degree_teachers::where('institute_id', $instId)->delete();
            Higher_degree_teachers::insert($hdTeachSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving Teachers_higher_edu_trainings */

        try {
            Teachers_higher_edu_trainings::where('institute_id', $instId)->delete();
            Teachers_higher_edu_trainings::insert($hdTrnSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data of Teachers_inservice_trainings */
        try {
            Teachers_inservice_trainings::where('id', $teacherInservTr["id"])->update($teacherInservTr);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data of Teachers_train_others_infos */
        try {
            Teachers_train_others_infos::where('id', $teacherTrainInfo["id"])->update($teacherTrainInfo);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data of Teachers_retire_award_infos */
        try {
            Teachers_retire_award_infos::where('id', $teacherRetAwInfo["id"])->update($teacherRetAwInfo);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->school_col_6th_page = 1;
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
