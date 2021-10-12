<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Lookup_guardian_occupation;
use App\Models\Lookup_subjectdtl;
use App\Models\Agewise_student_summary;
use App\Models\guardian_occupation;
use App\Models\Student_summary_prev_year;
use App\Models\Subjectwise_student_summary;
use App\Models\Submission_infos;
use App\Models\Student_summary_total;

class CollegeThirdPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonCollegeThird.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_id = [31, 32, 33, 34];
        $data->classes = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();
        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->classes, $class);
            }
        }

        /*Student Summary Total*/
        $data->studentSummaryTotal = Student_summary_total::where(['institute_id' => $inst_id])->first();
        if (empty($data->studentSummaryTotal)) {
            $toInsertArrSmt = [];
            $toInsertArrSmt['institute_id'] = $inst_id;
            Student_summary_total::insert($toInsertArrSmt);
            $data->studentSummaryTotal = Student_summary_total::where(['institute_id' => $inst_id])->first();
        }
        /*Student Summary Total*/

        /*Age Wise Students*/
        $ageWiseStudentData = Agewise_student_summary::where(['institute_id' => $inst_id])->get();
        if ($ageWiseStudentData->isEmpty()) {
            $toAddedAgeWiseStudentData = [];
            foreach ($data->classes as $class) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['class_id'] = $class['class_id'];
                array_push($toAddedAgeWiseStudentData, $toInsertArr);
            }
            try {
                Agewise_student_summary::insert($toAddedAgeWiseStudentData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Age Wise Table');
            }
            /*Now Return Age Wise rows*/
            $ageWiseStudentData = Agewise_student_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->ageWiseStudent = $ageWiseStudentData;
        /*Age Wise Students*/

        /*Guardian Occupation*/
        //$data->occupationsList=Lookup_guardian_occupation::all();
        $data->occupationsList = $occupationsList;
        $guardianOccupation = guardian_occupation::where(['institute_id' => $inst_id])->get();
        if ($guardianOccupation->isEmpty()) {
            $toAddedGuardianOccupation = [];
            foreach ($occupationsList as $occupation) {
                $toInsertArrOc = [];
                $toInsertArrOc['institute_id'] = $inst_id;
                $toInsertArrOc['occupation_id'] = $occupation['occupation_id'];
                array_push($toAddedGuardianOccupation, $toInsertArrOc);
            }
            try {
                guardian_occupation::insert($toAddedGuardianOccupation);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Guardian Occupation Table');
            }
            /*Now Return Guardian Occupation rows*/
            $guardianOccupation = guardian_occupation::where(['institute_id' => $inst_id])->get();
        }
        $data->guardianOccupation = $guardianOccupation;
        /*Guardian Occupation*/

        /*Students Summery Prev Yr*/
        $studentSummeryPrevYrData = Student_summary_prev_year::where(['institute_id' => $inst_id])->get();
        if ($studentSummeryPrevYrData->isEmpty()) {
            $toAddedStudentSumPrYr = [];
            foreach ($data->classes as $class) {
                foreach ($class['groups'] as $group) {
                    $toInsertArrPr = [];
                    $toInsertArrPr['institute_id'] = $inst_id;
                    $toInsertArrPr['education_level_id'] = $group['education_level_id'];
                    $toInsertArrPr['class_id'] = $class['class_id'];
                    $toInsertArrPr['group_id'] = $group['group_id'];
                    array_push($toAddedStudentSumPrYr, $toInsertArrPr);
                }
            }
            try {
                Student_summary_prev_year::insert($toAddedStudentSumPrYr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Student Summery Prev Yr Table');
            }
            /*Now Return ALl Student Summery Prev Yr rows*/
            $studentSummeryPrevYrData = Student_summary_prev_year::where(['institute_id' => $inst_id])->get();
        }

        $data->studentSummeryPrevYr = $studentSummeryPrevYrData;
        /*Students Summery Prev Yr Ends*/

        /*Subject wise teacher student summery*/
        $subjectWiseData = Subjectwise_student_summary::where(['institute_id' => $inst_id])->orderBy('subject_id')->get();
        $data->subjectList = $subjectList;
        if ($subjectWiseData->isEmpty()) {
            $toAddsubjectWiseData = [];
            foreach ($data->subjectList as $subject) {
                $toInsertArrSw = [];
                $toInsertArrSw['institute_id'] = $inst_id;
                $toInsertArrSw['subject_id'] = $subject['subjectdtl_id'];
                array_push($toAddsubjectWiseData, $toInsertArrSw);
            }
            try {
                Subjectwise_student_summary::insert($toAddsubjectWiseData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Subject Wise Table');
            }
            /*Now Return Subjectwise_student_summary rows*/
            $subjectWiseData = Subjectwise_student_summary::where(['institute_id' => $inst_id])->orderBy('subject_id')->get();
        }

        $data->subjectWiseData = $subjectWiseData;
        /*Subject wise teacher student summery*/

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
        $guardianOccupation = $data["guardianOccupation"];
        $ageWiseStudent = $data["ageWiseStudent"];
        $studentSumPrYr = $data["studentSummeryPrevYr"];
        $subjectWiseData = $data["subjectWiseData"];
        /*==================Parsing Table wise data from Array End=======*/

        /* saving ageWiseStudent */
        try {
            Agewise_student_summary::where('INSTITUTE_ID', $instId)->delete();
            Agewise_student_summary::insert($ageWiseStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        /* saving guardianOccupation */
        try {
            guardian_occupation::where('INSTITUTE_ID', $instId)->delete();
            guardian_occupation::insert($guardianOccupation);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*saving data of Student_summary_prev_year */
        try {
            Student_summary_prev_year::where('INSTITUTE_ID', $instId)->delete(); //firstly delete previous data
            Student_summary_prev_year::insert($studentSumPrYr); // then insert all the rows of the array
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving subject Wise student summary */
        try {
            Subjectwise_student_summary::where('institute_id', $instId)->delete();
            Subjectwise_student_summary::insert($subjectWiseData);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->college_3rd_page = 1;
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
