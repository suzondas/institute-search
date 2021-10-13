<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes;
use App\Models\Institutes_recognition;
use App\Models\Institutes_mpo_status;
use App\Models\Committees;
use App\Models\Lookup_education_levels;
use App\Models\Divisions;
use App\Models\Districts;
use App\Models\Thanas;
use App\Models\Mauzas;
use App\Models\Unions;
use App\Models\Submission_infos;
use App\Models\Inst_mpo_conditions;

class MadFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        // $data->institutes = Institutes::with('district', 'thana', 'mauza', 'union')->where(['institute_id' => $inst_id])->first();
        $data->institutes = Institutes::where(['institute_id' => $inst_id])->first();
        $data->institutes_recognition =Institutes_recognition::where(['institute_id'=>$inst_id])->orderby('education_level_id')->get();
        $data->institutes_mpo_status = Institutes_mpo_status::where(['institute_id'=>$inst_id])->orderby('education_level_id')->get();
        $data->division = Divisions::where(['division_id'=>$data->institutes->division_id])->get();
        $data->district = Districts::where(['district_id'=>$data->institutes->district_id])->get();
        $data->thana = Thanas::where(['thana_id'=>$data->institutes->thana_id])->get();
        $data->mauza = Mauzas::where(['mauza_id'=>$data->institutes->mauza_id])->get();
        $data->union = Unions::where(['union_id'=>$data->institutes->union_id])->get();

        $eduLevel = Lookup_education_levels::all();
        $data->eduLevel = $eduLevel;

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
        $committees = Committees::where(['institute_id'=>$inst_id])->first();
        if(empty($committees)){
            Committees::insert($toInsertArr);
            $committees = Committees::where(['institute_id' => $inst_id])->first();
        }
        $data->committees=$committees;
        /*Committees*/
        return response()->json($data);
    }

}
