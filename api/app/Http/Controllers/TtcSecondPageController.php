<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes_land_usage;
use App\Models\Building_infos;
use App\Models\Building_numbers;
use App\Models\Building_use;
use App\Models\Building_details;


class TtcSecondPageController extends Controller
{
    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        //Institute Land Usage
        $data->institutes_land_usage = Institutes_land_usage::where(['institute_id' => $inst_id])->first();
        if ($data->institutes_land_usage === null) {
            Institutes_land_usage::insert(['institute_id' => $inst_id]);
            $data->institutes_land_usage = Institutes_land_usage::where(['institute_id' => $inst_id])->first();
        }

        //Building Infos
        $data->building_infos = Building_infos::where(['institute_id' => $inst_id])->first();
        if ($data->building_infos === null) {
            Building_infos::insert(['institute_id' => $inst_id]);
            $data->building_infos = Building_infos::where(['institute_id' => $inst_id])->first();
        }

        //Building Numbers
        $data->building_numbers = Building_numbers::where(['institute_id' => $inst_id])->first();
        if ($data->building_numbers === null) {
            Building_numbers::insert(['institute_id' => $inst_id]);
            $data->building_numbers = Building_numbers::where(['institute_id' => $inst_id])->first();
        }

        //Building Use
        $data->building_use = Building_use::where(['institute_id' => $inst_id])->first();
        if ($data->building_use === null) {
            Building_use::insert(['institute_id' => $inst_id]);
            $data->building_use = Building_use::where(['institute_id' => $inst_id])->first();
        }

        //building_details
        $data->building_details = Building_details::where(['institute_id' => $inst_id])->get();
        if ($data->building_details->isEmpty()) {
            $toInsertArr = ['institute_id' => $inst_id, 'institute_id' => $inst_id, 'institute_id' => $inst_id, 'institute_id' => $inst_id, 'institute_id' => $inst_id];
            Building_details::insert($toInsertArr);
            $data->building_details = Building_details::where(['institute_id' => $inst_id])->get();
        }

        return response()->json($data);
    }

}
