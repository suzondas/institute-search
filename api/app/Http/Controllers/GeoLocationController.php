<?php

namespace App\Http\Controllers;

use App\Models\Districts;
use App\Models\Divisions;
use App\Models\Mauzas;
use App\Models\Thanas;
use App\Models\Unions;

class GeoLocationController extends Controller
{
    //
    public function index(){
        $data = new \stdClass();
        $data->divisions = Divisions::all();
        $data->districts = Districts::all();
        $data->unions = Unions::all();
        $data->mauza = Mauzas::all();
        $data->thanas = Thanas::all();
        return response()->json($data);
    }
}
