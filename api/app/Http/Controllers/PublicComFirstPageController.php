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

        /*First Page Submit Status*/
        $submissionInfos = Submission_infos::where(['institute_id'=>$inst_id])->first();
        if(empty($submissionInfos)){
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $inst_id]);
                $row->com_1st_page = 0;
                $row->updated_at = time();
                $row->save();
            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
                return response()->json($err, 500);
            }
        }
        /*First Page Submit Status*/
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $institutes = $data["institutes"];
        $foreign_univ_institutes = $data["foreign_univ_institutes"];

        try {
            Institutes::where('institute_id', $instId)->update([
                'latitude' => $institutes['latitude'],
                'longitude' => $institutes['longitude'],
                'institute_name_new' => $institutes['institute_name_new'],
                'institute_name_bangla' => $institutes['institute_name_bangla'],
                'location' => $institutes['location'],
                'post_office' => $institutes['post_office'],
                'post_code' => $institutes['post_code'],
                'mobphone' => $institutes['mobphone'],
                'telephone' => $institutes['telephone'],
                'mobphone_alternate' => $institutes['mobphone_alternate'],
                'e_mail' => $institutes['e_mail'],
                'web_site' => $institutes['web_site'],
                'ec_national_code' => $institutes['ec_national_code'],
                'ec_district_code' => $institutes['ec_district_code'],
                'education_level_id' => $institutes['education_level_id'],
                'institute_type_id' => $institutes['institute_type_id'],
                'management' => $institutes['management'],
                'for_whom' => $institutes['for_whom'],
                'area_status1' => $institutes['area_status1'],
                'constituency' => $institutes['constituency'],
                'constitute_no' => $institutes['constitute_no'],
                'univ_education_level_id' => $institutes['univ_education_level_id'],
                'recognition' => $institutes['recognition'],
                'nationalization_date' => $institutes['nationalization_date'],
                'establish_date' => $institutes['establish_date'],
                'geographical_status' => $institutes['geographical_status'],
                'forgine_univ_attath_yn' => $institutes['forgine_univ_attath_yn'],
                'univ_anushad_no' => $institutes['univ_anushad_no'],
                'univ_dept_no' => $institutes['univ_dept_no'],
                'univ_inst_no' => $institutes['univ_inst_no'],
                'univ_branch_no' => $institutes['univ_branch_no'],
                'univ_edu_type' => $institutes['univ_edu_type'],
                'semister_no' => $institutes['semister_no']
            ]);
        } catch (\Exception $e) {
            array_push($err, $e);
        }
        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            try {
                $row = Submission_infos::firstOrCreate(['institute_id' => $instId]);
                $row->com_1st_page = 1;
                $row->updated_at = time();
                $row->save();
                return response()->json("success", 200);
            } catch (\Exception $e) {
                array_push($err, $e->getMessage());
                return response()->json($err, 500);
            }
        }
    }

    /*
     * @method
     * Removes Foreign University Institute for Public University First Page
     * Dev- Suzon Das @18/07/20201
     */
    public function removeForeignUnivInst($id)
    {
        try {
            Foreign_univ_institutes::where('id', $id)->delete(); // delete previous data
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
        return response()->json('Success', 200);
    }

    public function addForeignUnivInst(Request $request)
    {
        $data = json_decode($request->getContent(), true);//converting json request to php array
        try {
            $toInsert = new Foreign_univ_institutes();
            $toInsert->institute_id = $data['institute_id'];
            $toInsert->univ_name = $data['univ_name'];
            $toInsert->country_name = $data['country_name'];
            $toInsert->save();
            return response()->json($toInsert, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
