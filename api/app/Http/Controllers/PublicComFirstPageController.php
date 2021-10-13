<?php


namespace App\Http\Controllers;

use App\Models\Submission_infos;
use Illuminate\Http\Request;
use App\Models\Institutes;
use App\Models\Committees;
use App\Models\Lookup_education_levels;
use App\Models\Divisions;
use App\Models\Districts;
use App\Models\Thanas;
use App\Models\Mauzas;
use App\Models\Unions;
use App\Models\Foreign_univ_institutes;


class PublicComFirstPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        // $data->institutes = Institutes::with('district', 'thana', 'mauza', 'union')->where(['institute_id' => $inst_id])->first();
        $data->institutes = Institutes::where(['institute_id' => $inst_id])->first();
        $data->division = Divisions::where(['division_id' => $data->institutes->division_id])->get();
        $data->district = Districts::where(['district_id' => $data->institutes->district_id])->get();
        $data->thana = Thanas::where(['thana_id' => $data->institutes->thana_id])->get();
        $data->mauza = Mauzas::where(['mauza_id' => $data->institutes->mauza_id])->get();
        $data->union = Unions::where(['union_id' => $data->institutes->union_id])->get();

        /*Foreign_univ_institutes*/
        $toInsertArr['institute_id'] = $inst_id;
        $foreign_univ_institutes = Foreign_univ_institutes::where(['institute_id' => $inst_id])->get();
        if ($foreign_univ_institutes->isEmpty()) {
            Foreign_univ_institutes::insert($toInsertArr);
            $foreign_univ_institutes = Foreign_univ_institutes::where(['institute_id' => $inst_id])->get();
        }
        $data->foreign_univ_institutes = $foreign_univ_institutes;
        /*Foreign_univ_institutes*/

        return response()->json($data);
    }

}
