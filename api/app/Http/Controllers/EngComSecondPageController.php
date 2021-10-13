<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes_land_usage;
use App\Models\Building_infos;
use App\Models\Building_numbers;
use App\Models\Building_use;
use App\Models\Building_details;
use App\Models\Classwise_room_space;
use App\Models\Lookup_education_levels;
use App\Models\Classes;

class EngComSecondPageController extends Controller
{
    public function index($inst_id){
        $data = new \stdClass();
        $data->institutes_land_usage = Institutes_land_usage::where(['institute_id'=>$inst_id])->first();
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
        $data->building_numbers = Building_numbers::where(['institute_id'=>$inst_id])->get();
        if ($data->building_numbers === null) {
            Building_numbers::insert(['institute_id' => $inst_id]);
            $data->building_numbers = Building_numbers::where(['institute_id' => $inst_id])->first();
        }
        $data->building_use = Building_use::where(['institute_id'=>$inst_id])->get();
        if ($data->building_use === null) {
            Building_use::insert(['institute_id' => $inst_id]);
            $data->building_use = Building_use::where(['institute_id' => $inst_id])->first();
        }

        /*building_details*/
        $building_details = Building_details::where(['institute_id'=>$inst_id])->get();
        if ($building_details->isEmpty()) {
            $toInsertArr['institute_id'] = $inst_id;
            try {
                Building_details::insert($toInsertArr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Building Details Table');
            }
            /*Now Return ALl Building_details rows*/
            $building_details = Building_details::where(['institute_id' => $inst_id])->get();
        }
        $data->building_details = $building_details;

        $data->classwise_room_space = Classwise_room_space::where(['institute_id'=>$inst_id])->get();
        $classesData =Classes::all();
        $edu_level_id = [96, 97, 98];
        $data->classes = [];
        foreach ($classesData as $class) {
            if (in_array($class['education_level_id'], $edu_level_id)) {
                array_push($data->classes, $class);
            }
        }

        /*Classwise_room_space*/
        $classwise_room_space = Classwise_room_space::where(['institute_id' => $inst_id])->orderby('class_id')->get();
        if ($classwise_room_space->isEmpty()) {
            $toAddedClassWiseRoom = [];
            foreach ($data->classes as $class) {
                $toInsertArrCl = [];
                $toInsertArrCl['institute_id'] = $inst_id;
                $toInsertArrCl['class_id'] = $class['class_id'];
                array_push($toAddedClassWiseRoom, $toInsertArrCl);
            }
            try {
                Classwise_room_space::insert($toAddedClassWiseRoom);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Student Summery Table');
            }
            /*Now Return ALl Classwise_room_space rows*/
            $classwise_room_space = Classwise_room_space::where(['institute_id' => $inst_id])->orderby('class_id')->get();
        }
        $data->classwise_room_space = $classwise_room_space;
        /*Classwise_room_space  Ends*/

        //$eduLevel=Lookup_education_levels::all();
        //$data->eduLevel=$eduLevel;
        //print_r($classwise_room_space_data);die;
        return response()->json($data);
    }

}
