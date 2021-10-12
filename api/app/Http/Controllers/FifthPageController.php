<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Climate_disaster_manage_infos;
use App\Models\Covid_infos;
use App\Models\Covid_std_summaries;

class FifthPageController extends Controller
{
    public function index($inst_id)
    {
        $data = new \stdClass();
        $toInsertArr['institute_id'] = $inst_id;

        /*Climate_disaster_manage_infos*/
        $climate_disaster_manage_infos = Climate_disaster_manage_infos::where(['institute_id' => $inst_id])->first();
        if (empty($climate_disaster_manage_infos)) {
            Climate_disaster_manage_infos::insert($toInsertArr);
            $climate_disaster_manage_infos = Climate_disaster_manage_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->climate_disaster_manage_infos = $climate_disaster_manage_infos;
        /*Climate_disaster_manage_infos*/

        /*Covid_infos*/
        $covid_infos = Covid_infos::where(['institute_id' => $inst_id])->first();
        if (empty($covid_infos)) {
            $toInsertArr['institute_id'] = $inst_id;
            Covid_infos::insert($toInsertArr);
            $covid_infos = Covid_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->covid_infos = $covid_infos;
        /*Covid_infos*/

        /*Covid_std_summaries*/
        $data->covid_std_summaries = Covid_std_summaries::where(['institute_id' => $inst_id])->get();
        if ($data->covid_std_summaries->isEmpty()) {
            $classIds = [1206=>'৬ষ্ঠ', 1207=>'৭ম', 1208=>'৮ম', 1309=>'৯ম', 1310=>'১০ম',3111=>'একাদশ',3112=>'দ্বাদশ'];
            $rowsArray = [];
            foreach ($classIds as $classId=>$className) {
                $toInsertArr = [];
                $toInsertArr['class_id'] = $classId;
                $toInsertArr['class_name'] = $className;
                $toInsertArr['institute_id'] = $inst_id;
                array_push($rowsArray, $toInsertArr);
            }
            Covid_std_summaries::insert($rowsArray);
            $data->covid_std_summaries = Covid_std_summaries::where(['institute_id' => $inst_id])->get();
        }
        /*Ends Covid_std_summaries*/

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $err = []; // error container for updating table data
        $data = json_decode($request->getContent(), true); // collecting data and decoding from json to array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $climate_disaster_manage_infos = $data["climate_disaster_manage_infos"];
        $covid_infos = $data["covid_infos"];
        $covid_std_summaries = $data["covid_std_summaries"];

        /*saving disaster management data*/
        try {
            Climate_disaster_manage_infos::where('institute_id', $instId)->update($climate_disaster_manage_infos);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /* saving covid data*/
        try {
            Covid_infos::where('institute_id', $instId)->update($covid_infos);
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
        }

        /*Saving Covid_std_summaries*/
        if (!empty($covid_std_summaries)) {
            try {
                Covid_std_summaries::where('institute_id', $instId)->delete(); //firstly delete previous data
                Covid_std_summaries::insert($covid_std_summaries); // then insert all the rows of the array

            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
            }
        }
        /*Ends Saving Covid_std_summaries*/

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }

}
