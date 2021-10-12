<?php

namespace App\Http\Controllers;

use App\Models\Designation_schools;
use App\Models\Designations_college;
use App\Models\Designations_sch_cols;
use App\Models\Lookup_prof_subject;
use App\Models\Prof_certificate_std;
use App\Models\Prof_students_summary;
use App\Models\Submission_infos;
use Illuminate\Http\Request;

class ProfStdFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        //loading Local Json Data
      //  $desig=Designation_schools::whereNotNull('designation_id')->orderby('sch_sl')->get();
       // return  response()->json($desig);

        require_once app()->basePath('app') . '/Helpers/LookUpJsonProfFirst.php';
        $data->professionalClasses = $classesJsonData;
        /*students summary*/
        $profStudentSum = Prof_students_summary::where(['institute_id' => $inst_id])->get();
        if ($profStudentSum->isEmpty()) {
            $toAddProfStudent = [];
            foreach ($classesJsonData as $classes) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['subject_id'] = $classes['subject_id'];
                $toInsertArr['subject_name'] = $classes['subject_name'];
                array_push($toAddProfStudent, $toInsertArr);
            }
            try {
                Prof_students_summary::insert($toAddProfStudent);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Professional Student Table');

            }
            /*Now return inserted data*/
            $profStudentSum = Prof_students_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->profStdSum = $profStudentSum;

        /*students summary*/


        /*certicate Course Students*/
        $certificateStudent = Prof_certificate_std::where(['institute_id' => $inst_id])->get();
        if ($certificateStudent->isEmpty()) {
            $toAddCertStudent = [];
            foreach ($classesJsonData as $classes) {
                $toInsertArrCrt = [];
                $toInsertArrCrt['institute_id'] = $inst_id;
                $toInsertArrCrt['subject_id'] = $classes['subject_id'];
                array_push($toAddCertStudent, $toInsertArrCrt);
            }
            try {
                Prof_certificate_std::insert($toAddCertStudent);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Professional Student Table');

            }
            /*Now return inserted data*/
            $certificateStudent = Prof_certificate_std::where(['institute_id' => $inst_id])->get();
        }

        $data->certificateStudent = $certificateStudent;
        /*certicate Course Students*/


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
        $profStdSum = $data["profStdSum"];
        $certificateStudent = $data["certificateStudent"];
        /*==================Parsing Table wise data from Array End=======*/
        /* saving Professional_student_summary */



        try {
            Prof_students_summary::where('institute_id', $instId)->delete();
            Prof_students_summary::insert($profStdSum);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        try {
            Prof_certificate_std::where('institute_id', $instId)->delete();
            Prof_certificate_std::insert($certificateStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->prof_3rd_page = 1;
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
