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


    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $institutes_land_usage = $data["institutes_land_usage"];
        $building_infos = $data["building_infos"];
        $building_numbers = $data["building_numbers"];
        $building_use = $data["building_use"];
        $building_details = $data["building_details"];

        /*saving data land usage */
        try {
            Institutes_land_usage::where('institute_id', $instId)->update($institutes_land_usage);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }
        /*saving data building_infos */
        try {
            Building_infos::where('institute_id', $instId)->update($building_infos);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }
        /*saving data building numbers */
        try {
            building_numbers::where('institute_id', $instId)->update($building_numbers);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /*saving data building_use */
        try {
            Building_use::where('institute_id', $instId)->update($building_use);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /*saving data building_details */
        try {
            Building_details::where('institute_id', $instId)->delete(); //firstly delete previous data
            Building_details::insert($building_details); // then insert all the rows of the array
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }
}
