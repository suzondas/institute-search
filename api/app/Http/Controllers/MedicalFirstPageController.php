<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes;
use App\Models\Committees;
use App\Models\Divisions;
use App\Models\Districts;
use App\Models\Thanas;
use App\Models\Mauzas;
use App\Models\Unions;


class MedicalFirstPageController extends Controller
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
            'nearest_admin_unit_distant',
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
            'head_status',
            'MED_ODHIVUKTI'
        ]);
        $data->division = Divisions::where(['division_id' => $data->institutes->division_id])->first('division_name');
        $data->district = Districts::where(['district_id' => $data->institutes->district_id])->first('district_name');
        $data->thana = Thanas::where(['thana_id' => $data->institutes->thana_id])->first('thana_name');
        $data->mauza = Mauzas::where(['mauza_id' => $data->institutes->mauza_id])->first('mauza_name');
        $data->union = Unions::where(['union_id' => $data->institutes->union_id])->first('union_name');

       // $data->institutes_recognition = Institutes_recognition::where(['institute_id' => $inst_id])->orderby('education_level_id')->get();
      //  $data->institutes_mpo_status = Institutes_mpo_status::where(['institute_id' => $inst_id])->orderby('education_level_id')->get();

        /*Committees*/
        $toInsertArr['institute_id'] = $inst_id;
        $committees = Committees::where(['institute_id' => $inst_id])->first();
        if ($committees === null) {
            Committees::insert($toInsertArr);
            $committees = Committees::where(['institute_id' => $inst_id])->first();
        }
        $data->committees = $committees;
        /*Committees*/
        return response()->json($data);
    }


}
