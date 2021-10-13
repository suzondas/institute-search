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



}
