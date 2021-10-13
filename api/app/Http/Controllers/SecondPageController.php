<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes_land_usage;
use App\Models\Building_infos;
use App\Models\Building_numbers;
use App\Models\Building_use;
use App\Models\Building_details;
use App\Models\Classwise_room_space;
use App\Models\Classes;

class SecondPageController extends Controller
{
    public function index($inst_id, $inst_type)
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
            $data->building_details = Building_details::where(['institute_id' => $inst_id])->orderby('class_id')->get();
        }

        /*Classwise_room_space*/
        $data->classwise_room_space = Classwise_room_space::where(['institute_id' => $inst_id])->orderby('class_id')->get();
        if ($data->classwise_room_space->isEmpty()) {
            $classesData = Classes::all();
            if (in_array($inst_type, [1, 3, 4])) {
                $edu_level_id = [12 => 'নিম্ন মাধ্যমিক', 13 => 'মাধ্যমিক', 31 => 'উচ্চ মাধ্যমিক',
                    32 => 'স্নাতক(পাশ)', 33 => 'স্নাতক ', 34 => 'স্নাতকোত্তর'];
            } elseif ($inst_type == 2) {
                $edu_level_id = [21 => 'দাখিল', 22 => 'আলিম', 23 => 'ফাজিল', 24 => 'কামিল', 25 => 'মাস্টার্স'];
            } elseif ($inst_type == 5) {
                $edu_level_id = [12 => 'নিম্ন মাধ্যমিক', 51 => 'এসএসসি ভোক.', 52 => 'এইচএসসি বিএম', 67 => 'ডিপ্লোমা'];
            } elseif ($inst_type == 6) {

            } elseif ($inst_type == 7) {
                $edu_level_id = [33 => 'স্নাতক ', 34 => 'স্নাতকোত্তর', 67 => 'ডিপ্লোমা'];
            }

            $classes = [];
            foreach ($classesData as $class) {
                if (array_key_exists($class['education_level_id'], $edu_level_id)) {
                    $class['education_level_name_bangla'] = $edu_level_id[$class['education_level_id']];
                    array_push($classes, $class);
                }
            }
            $toAddedClassWiseRoom = [];
            foreach ($classes as $class) {
                $toInsertArr = [];
                $toInsertArr['institute_id'] = $inst_id;
                $toInsertArr['class_id'] = $class['class_id'];
                $toInsertArr['class_name_bangla'] = $class['class_name_bangla'];
                $toInsertArr['education_level_name_bangla'] = $class['education_level_name_bangla'];
                array_push($toAddedClassWiseRoom, $toInsertArr);
            }
            Classwise_room_space::insert($toAddedClassWiseRoom);
            $data->classwise_room_space = Classwise_room_space::where(['institute_id' => $inst_id])->orderby('class_id')->get();
        }

        return response()->json($data);
    }
}
