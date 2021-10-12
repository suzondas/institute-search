<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes;
use App\Models\Institutes_recognition;
use App\Models\Institutes_mpo_status;
use App\Models\Inst_mpo_conditions;
use App\Models\Committees;
use App\Models\Divisions;
use App\Models\Districts;
use App\Models\Thanas;
use App\Models\Mauzas;
use App\Models\Unions;
use App\Models\Submission_infos;


class FirstPageController extends Controller
{
    public function index($inst_id)
    {
        $data = new \stdClass();
        // $data->institutes = Institutes::with('district', 'thana', 'mauza', 'union')->where(['institute_id' => $inst_id])->first();
        $data->institutes = Institutes::where(['institute_id' => $inst_id])->first([
            'institute_id',
            'eiin',
            'latitude',
            'longitude',
            'institute_name_new',
            'institute_name_bangla',
            'location',
            'post_office',
            'post_code',
            'mobphone',
            'telephone',
            'mobphone_alternate',
            'e_mail',
            'web_site',
            'ec_national_code',
            'ec_district_code',
            'education_level_id',
            'institute_type_id',
            'arts_group',
            'science_group',
            'commerce_group',
            'arts_group_col',
            'science_group_col',
            'commerce_group_col',
            'social_science_group',
            'islamic_stadies_group',
            'music_group',
            'home_economic_group',
            'technical_branch_type_agro',
            'technical_branch_type_fish',
            'technical_branch_type',
            'technical_branch_type_hscvoc',
            'technical_branch_type_bm',
            'establish_date',
            'english_ver_yn',
            'management',
            'nationalization_date',
            'for_whom',
            'geographical_status',
            'area_status1',
            'admin_unit_communication',
            'nearest_inst_distant',
            'branch_yn',
            'branch_no',
            'campus_yn',
            'attach_inst_yn',
            'mpo_status',
            'technical_branch_mpo_status',
            'double_shipt_yn',
            'establish_date_college',
            'constituency',
            'constitute_no',
            'division_id',
            'district_id',
            'thana_id',
            'mauza_id',
            'union_id',
            'attached_inst_type',
            'nearest_admin_unit_distant'
        ]);
        $data->division = Divisions::where(['division_id' => $data->institutes->division_id])->first('division_name');
        $data->district = Districts::where(['district_id' => $data->institutes->district_id])->first('district_name');
        $data->thana = Thanas::where(['thana_id' => $data->institutes->thana_id])->first('thana_name');
        $data->mauza = Mauzas::where(['mauza_id' => $data->institutes->mauza_id])->first('mauza_name');
        $data->union = Unions::where(['union_id' => $data->institutes->union_id])->first('union_name');

        $data->institutes_recognition = Institutes_recognition::where(['institute_id' => $inst_id])->orderby('education_level_id')->get();
        $data->institutes_mpo_status = Institutes_mpo_status::where(['institute_id' => $inst_id])->orderby('education_level_id')->get();

        /*Inst_mpo_conditions*/
        $data->inst_mpo_conditions = Inst_mpo_conditions::where(['institute_id'=>$inst_id])->orderby('year')->get();
        if($data->inst_mpo_conditions->isEmpty()){
            $year = ['2018' => '2018', '2019' => '2019', '2020' => '2020'];
            $toAddedYr = [];
            foreach ($year as $yr){
                $toInsertArrMp = [];
                $toInsertArrMp['year'] = $yr;
                $toInsertArrMp['institute_id'] = $inst_id;
                array_push($toAddedYr, $toInsertArrMp);
            }
            Inst_mpo_conditions::insert($toAddedYr);
            $inst_mpo_conditions = Inst_mpo_conditions::where(['institute_id' => $inst_id])->orderby('year')->get();
            $data->inst_mpo_conditions=$inst_mpo_conditions;
        }

        /*Inst_mpo_conditions*/

        /*Committees*/
        $toInsertArr['institute_id'] = $inst_id;
        $committees = Committees::where(['institute_id' => $inst_id])->first();
        if ($committees === null) {
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
        $institutes_recognition = $data["institutes_recognition"];
        $committees = $data["committees"];
        $institutes_mpo_status = $data["institutes_mpo_status"];
        $inst_mpo_conditions = $data["inst_mpo_conditions"];

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
                'arts_group' => $institutes['arts_group'],
                'science_group' => $institutes['science_group'],
                'commerce_group' => $institutes['commerce_group'],
                'arts_group_col' => $institutes['arts_group_col'],
                'science_group_col' => $institutes['science_group_col'],
                'commerce_group_col' => $institutes['commerce_group_col'],
                'social_science_group' => $institutes['social_science_group'],
                'islamic_stadies_group' => $institutes['islamic_stadies_group'],
                'music_group' => $institutes['music_group'],
                'home_economic_group' => $institutes['home_economic_group'],
                'technical_branch_type_agro' => $institutes['technical_branch_type_agro'],
                'technical_branch_type_fish' => $institutes['technical_branch_type_fish'],
                'technical_branch_type' => $institutes['technical_branch_type'],
                'technical_branch_type_hscvoc' => $institutes['technical_branch_type_hscvoc'],
                'technical_branch_type_bm' => $institutes['technical_branch_type_bm'],
                'establish_date' => $institutes['establish_date'],
                'english_ver_yn' => $institutes['english_ver_yn'],
                'management' => $institutes['management'],
                'nationalization_date' => $institutes['nationalization_date'],
                'for_whom' => $institutes['for_whom'],
                'geographical_status' => $institutes['geographical_status'],
                'area_status1' => $institutes['area_status1'],
                'admin_unit_communication' => $institutes['admin_unit_communication'],
                'nearest_inst_distant' => $institutes['nearest_inst_distant'],
                'branch_yn' => $institutes['branch_yn'],
                'branch_no' => $institutes['branch_no'],
                'campus_yn' => $institutes['campus_yn'],
                'attach_inst_yn' => $institutes['attach_inst_yn'],
                'mpo_status' => $institutes['mpo_status'],
                'technical_branch_mpo_status' => $institutes['technical_branch_mpo_status'],
                'double_shipt_yn' => $institutes['double_shipt_yn'],
                'establish_date_college' => $institutes['establish_date_college'],
                'constituency' => $institutes['constituency'],
                'constitute_no' => $institutes['constitute_no'],
                'attached_inst_type'=>$institutes['attached_inst_type']
            ]);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /*update data Institutes_recognition */
        if (!empty($institutes_recognition)) {
            try {
                Institutes_recognition::where('institute_id', $instId)->delete(); //firstly delete previous data
                Institutes_recognition::insert($institutes_recognition); // then insert all the rows of the array

            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
            }
        }

        /*update data Institutes_mpo_status */
        if (!empty($institutes_mpo_status)) {
            try {
                Institutes_mpo_status::where('institute_id', $instId)->delete(); //firstly delete previous data
                Institutes_mpo_status::insert($institutes_mpo_status); // then insert all the rows of the array

            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
            }
        }

        /* saving Inst_mpo_conditions */
        try {
            Inst_mpo_conditions::where('institute_id', $instId)->delete();
            Inst_mpo_conditions::insert($inst_mpo_conditions);
        } catch (\Exception $e) {
            array_push($err, $e);
        }

        /*update Committees data */
        try {
            Committees::where('institute_id', $instId)->update($committees);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->com_1st_page = 1;
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
