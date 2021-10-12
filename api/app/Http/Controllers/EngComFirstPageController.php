<?php


namespace App\Http\Controllers;

use App\Models\Institutes_mpo_status;
use Illuminate\Http\Request;
use App\Models\Institutes;
use App\Models\Committees;
use App\Models\Lookup_education_levels;
use App\Models\Divisions;
use App\Models\Districts;
use App\Models\Thanas;
use App\Models\Mauzas;
use App\Models\Unions;
use App\Models\Submission_infos;

class EngComFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        // $data->institutes = Institutes::with('district', 'thana', 'mauza', 'union')->where(['institute_id' => $inst_id])->first();
        $data->institutes = Institutes::where(['institute_id' => $inst_id])->first();
        $data->division = Divisions::where(['division_id' => $data->institutes->division_id])->get();
        $data->district = Districts::where(['district_id' => $data->institutes->district_id])->get();
        $data->thana = Thanas::where(['thana_id' => $data->institutes->thana_id])->get();
        $data->mauza = Mauzas::where(['mauza_id' => $data->institutes->mauza_id])->get();
        $data->union = Unions::where(['union_id' => $data->institutes->union_id])->get();

        $eduLevel = Lookup_education_levels::all();
        $data->eduLevel = $eduLevel;

        /*Committees*/
        $toInsertArr['institute_id'] = $inst_id;
        $committees = Committees::where(['institute_id' => $inst_id])->first();
        if (empty($committees)) {
            Committees::insert($toInsertArr);
            $committees = Committees::where(['institute_id' => $inst_id])->first();
        }
        $data->committees = $committees;
        /*Committees*/

        /*First Page Submit Status*/
        $submissionInfos = Submission_infos::where(['institute_id'=>$inst_id])->first();
        if(empty($submissionInfos)){
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $inst_id]);
                $row->com_1st_page = 0;
                $row->updated_at = time();
                $row->save();
            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
                return response()->json($err, 500);
            }
        }
        /*First Page Submit Status*/

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $institutes = $data["institutes"];
        $committees = $data["committees"];

        try {
            Institutes::where('institute_id', $instId)->update([
                'latitude' => $institutes['latitude'],
                'longitude' => $institutes['longitude'],
                'institute_name_new' => $institutes['institute_name_new'],
                'institute_name_bangla' => $institutes['institute_name_bangla'],
                'location' => $institutes['location'],
                'post_office' => $institutes['post_office'],
                'post_code' => $institutes['post_code'],
                'mobphone' => $institutes['mobphone'],
                'telephone' => $institutes['telephone'],
                'mobphone_alternate' => $institutes['mobphone_alternate'],
                'e_mail' => $institutes['e_mail'],
                'web_site' => $institutes['web_site'],
                'ec_national_code' => $institutes['ec_national_code'],
                'ec_district_code' => $institutes['ec_district_code'],
                'education_level_id' => $institutes['education_level_id'],
                'institute_type_id' => $institutes['institute_type_id'],
                'english_ver_yn' => $institutes['english_ver_yn'],
                'management' => $institutes['management'],
                'for_whom' => $institutes['for_whom'],
                'area_status1' => $institutes['area_status1'],
                'campus_yn' => $institutes['campus_yn'],
                'constituency' => $institutes['constituency'],
                'constitute_no' => $institutes['constitute_no'],
                'registration_authority' => $institutes['registration_authority'],
                'course_curriculam_authority' => $institutes['course_curriculam_authority'],
                'lowest_class_id' => $institutes['lowest_class_id'],
                'shift_no' => $institutes['shift_no']
            ]);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*update Committees data */
//        if (!empty($committees)) {
//            try {
//                Committees::where('institute_id', $instId)->delete(); //firstly delete previous data
//                Committees::insert($committees); // then insert all the rows of the array
//
//            } catch (\Exception $e) {
//                array_push($err, $e);
//            }
//        }
        try {
            Committees::where('institute_id', $instId)->update($committees);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->english_1st_page = 1;
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
