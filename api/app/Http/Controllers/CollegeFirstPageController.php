<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student_summary_total;
use App\Models\Students_summary;
use App\Models\Student_summary_repeater;
use App\Models\Student_summary_dropout;
use App\Models\Yr_wise_hscbm;
use App\Models\Yr_wise_hscvocs;
use App\Models\Submission_infos;

class CollegeFirstPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonCollege.php';

        /*Education Level Wise Classes with Groups Fetching*/
        $edu_level_id = [31, 32, 33, 34];
        $edu_voc_id = 52;
        $edu_bm_id = 54;
        $data->classes = [];
        $data->vocClasses = [];
        $data->bmClasses = [];

        /*Json Class Data iteration*/
        //$classesJsonData =Classes::with('groups')->get();
        foreach ($classesJsonData as $class) {
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->classes, $class);
            }
            if ($class['education_level_id'] == $edu_voc_id) {
                array_push($data->vocClasses, $class);
            }
            if ($class['education_level_id'] == $edu_bm_id) {
                array_push($data->bmClasses, $class);
            }
        }
        /*Education Level Wise Classes with Groups Fetching Ends*/
//        return response()->json($classes);

        /*Student Summary Total*/
        $data->studentSummaryTotal = Student_summary_total::where(['institute_id' => $inst_id])->first();
        if (empty($data->studentSummaryTotal)) {
            $toInsertArrSmt = [];
            $toInsertArrSmt['institute_id'] = $inst_id;
            Student_summary_total::insert($toInsertArrSmt);
            $data->studentSummaryTotal = Student_summary_total::where(['institute_id' => $inst_id])->first();
        }
        /*Student Summary Total*/

        /*Students Summary*/
        $studentSummaryData = Students_summary::where(['institute_id' => $inst_id])->get();
        if ($studentSummaryData->isEmpty()) {
            $toAddedStudentSummary = [];
            foreach ($data->classes as $class) {
                foreach ($class['groups'] as $group) {
                    $toInsertArr = [];
                    $toInsertArr['institute_id'] = $inst_id;
                    $toInsertArr['education_level_id'] = $group['education_level_id'];
                    $toInsertArr['class_id'] = $class['class_id'];
                    $toInsertArr['group_id'] = $group['group_id'];
                    array_push($toAddedStudentSummary, $toInsertArr);
                }
            }
            try {
                Students_summary::insert($toAddedStudentSummary);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Student Summary Table');
            }
            /*Now Return ALl Student Summary rows*/
            $studentSummaryData = Students_summary::where(['institute_id' => $inst_id])->get();
        }
        $data->studentSummary = $studentSummaryData;
        /*Students Summary Ends*/

        /*Repeater*/
        $stdRepdata = Student_summary_repeater::where(['institute_id' => $inst_id])->first();
        if (empty($stdRepdata)) {
            $toInsertArrRp = [];
            $toInsertArrRp['institute_id'] = $inst_id;
            Student_summary_repeater::insert($toInsertArrRp);
            $stdRepdata = Student_summary_repeater::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryRepeater = $stdRepdata;
        /*Repeater*/

        /*Dropout*/

        $stdDropdata = Student_summary_dropout::where(['institute_id' => $inst_id])->first();
        if (empty($stdDropdata)) {
            $toInsertArrDp = [];
            $toInsertArrDp['institute_id'] = $inst_id;
            Student_summary_dropout::insert($toInsertArrDp);
            $stdDropdata = Student_summary_dropout::where(['institute_id' => $inst_id])->first();
        }
        $data->studentSummaryDropout = $stdDropdata;
        /*Dropout*/

        /*HSC VOC Students */
        $hscVocStudentData = Yr_wise_hscvocs::where(['institute_id' => $inst_id])->get();
        if ($hscVocStudentData->isEmpty()) {
            $toAddedHscVocData = [];
            foreach ($data->vocClasses as $class) {
                $toInsertArrHsV = [];
                $toInsertArrHsV['institute_id'] = $inst_id;
                $toInsertArrHsV['education_level_id'] = $class['education_level_id'];
                $toInsertArrHsV['class_id'] = $class['class_id'];
                array_push($toAddedHscVocData, $toInsertArrHsV);
            }
            try {
                Yr_wise_hscvocs::insert($toAddedHscVocData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSC VOC Student Table');
            }
            /*Now Return HSC VOC Students rows*/
            $hscVocStudentData = Yr_wise_hscvocs::where(['institute_id' => $inst_id])->get();
        }
        $data->hscVocStudent = $hscVocStudentData;
        /*HSC VOC Students*/

        /*HSC BM Students */
        $hscBmStudentData = Yr_wise_hscbm::where(['institute_id' => $inst_id])->get();
        if ($hscBmStudentData->isEmpty()) {
            $toAddedHscBmData = [];
            foreach ($data->bmClasses as $class) {
                $toInsertArrBm = [];
                $toInsertArrBm['institute_id'] = $inst_id;
                $toInsertArrBm['education_level_id'] = $class['education_level_id'];
                $toInsertArrBm['class_id'] = $class['class_id'];
                array_push($toAddedHscBmData, $toInsertArrBm);
            }
            try {
                Yr_wise_hscbm::insert($toAddedHscBmData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save HSC BM Student Table');
            }
            /*Now Return HSC BM Students rows*/
            $hscBmStudentData = Yr_wise_hscbm::where(['institute_id' => $inst_id])->get();
        }
        $data->hscBmStudent = $hscBmStudentData;
        /*HSC BM Students*/

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
        $studentSummaryTotal = $data["studentSummaryTotal"];
        $studentSummary = $data["studentSummary"];
        $studentSummaryRepeater = $data["studentSummaryRepeater"];
        $studentSummaryDropout = $data["studentSummaryDropout"];
        $hscVocStudent = $data["hscVocStudent"];
        $hscBmStudent = $data["hscBmStudent"];
        /*==================Parsing Table wise data from Array End=======*/

        /*saving data of studentSummaryTotal */
        try {
            Student_summary_total::where('id', $studentSummaryTotal["id"])->update($studentSummaryTotal);

        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving studentSummary */
        try {
            Students_summary::where('institute_id', $instId)->delete();
            Students_summary::insert($studentSummary);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving studentSummaryRepeater */
        try {
            Student_summary_repeater::where('institute_id', $instId)->delete();
            Student_summary_repeater::insert($studentSummaryRepeater);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving studentSummaryDropout */
        try {
            Student_summary_dropout::where('institute_id', $instId)->delete();
            Student_summary_dropout::insert($studentSummaryDropout);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving hscVocStudent */
        try {
            Yr_wise_hscvocs::where('institute_id', $instId)->delete();
            Yr_wise_hscvocs::insert($hscVocStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /* saving hscBmStudent */
        try {
            Yr_wise_hscbm::where('institute_id', $instId)->delete();
            Yr_wise_hscbm::insert($hscBmStudent);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->college_1st_page = 1;
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
