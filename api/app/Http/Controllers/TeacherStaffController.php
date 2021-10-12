<?php

namespace App\Http\Controllers;

use App\Models\Designation_schools;
use App\Models\Designations;
use App\Models\Designations_college;
use App\Models\Designations_sch_cols;
use App\Models\Designations_tecs;
use App\Models\Designations_ttcs;
use App\Models\Lookup_subjectdtl;
use App\Models\Lookup_subjects;
use App\Models\Lookup_tech_training;
use App\Models\Submission_infos;
use App\Models\Teach_general_infos;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Designations_engs;
use PhpParser\Node\Expr\Cast\Object_;

class TeacherStaffController extends Controller
{
    public function getAll($inst_id)
    {
        /*        $data =  new \stdClass();
        //        $data->designation = Designations_tecs::get();
                $data->subjects = Lookup_subjectdtl::where('institute_type_id', '5')->get();
                return response()->json($data);*/
//        ['id','institute_id','teach_name','nid','desig_id','subject_id','dob','salary_eft','mobile_number']
        return response()->json(Teach_general_infos::where(['institute_id' => $inst_id])->get(['id', 'institute_id', 'teach_name', 'nid', 'desig_id', 'subject_id', 'dob', 'salary_eft', 'mobile_number', 'is_inactive']));
    }

    public function getTeacher($id)
    {
        return response()->json(Teach_general_infos::find($id));
    }

    public function addTeacher(Request $request)
    {
        try {
            $data = Teach_general_infos::create($request->json()->all());
            return response()->json($data->fresh());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function removeTeacher($teacher_id)
    {
        try {
            $data = Teach_general_infos::find($teacher_id);
            $data->delete();
            return response()->json('Teacher has be removed', 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function saveTeacher(Request $request)
    {
        $data = $request->json()->all();//converting json request to php array
//        return response()->json($data);
        if (isset($data['id'])) {//checking valid data payload
            $id = $data['id']; //assigning row id
            /*update Teacher data */
            try {
                Teach_general_infos::where('id', $id)->update($data);
            } catch (\Exception $e) {
                return response()->json($e->getMessage(), 500);
            }
            return response()->json('Successfully Updated Teacher Data');
        }
        return response()->json('No Data Provided', 500);
    }

    public function store(Request $request)
    {
        $err = [];
        try {
            $data = json_decode($request->getContent(), true);
            $row = Submission_infos::firstOrCreate(['institute_id' => $data["institute_id"]]);
            $row->com_tech_staf_page = 1;
            $row->updated_at = time();
            $row->save();
            return response()->json("success", 200);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
            return response()->json($err, 500);
        }
    }
}
