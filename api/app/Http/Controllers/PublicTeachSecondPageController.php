<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 4:40 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ_resh_wise_teachers;


class PublicTeachSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $data = new \stdClass();
        /*Foreign_univ_institutes*/
        $data->univ_resh_wise_teachers = Univ_resh_wise_teachers::where(['institute_id' => $inst_id])->get();
        /*Foreign_univ_institutes*/

        return response()->json($data);
    }

    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        //  $data=$request->getContent();
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $univ_resh_wise_teachers = $data["univ_resh_wise_teachers"];
        //return response()->json($univ_country_wise_stds);
        /*saving data Univ_degree_wise_stds */
//        try {
//            Univ_country_wise_stds::where('institute_id', $instId)->delete();
//            Univ_country_wise_stds::insert($univ_country_wise_stds);
//        } catch (\Exception $e) {
//            array_push($err, $e);
//        }
        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }

    public function removeReshTeacher($id)
    {
        try {
            Univ_resh_wise_teachers::where('id', $id)->delete(); // delete previous data
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
        return response()->json('Success', 200);
    }

    public function addReshTeacher(Request $request)
    {
        $data = json_decode($request->getContent(), true);//converting json request to php array
        try {
            $toInsert = new Univ_resh_wise_teachers();
            $toInsert->institute_id = $data['institute_id'];
            $toInsert->faculty_name = $data['faculty_name'];
            $toInsert->dept_name = $data['dept_name'];
            $toInsert->resh_degis_id = $data['resh_degis_id'];
            $toInsert->total_full = $data['total_full'];
            $toInsert->female_full = $data['female_full'];
            $toInsert->funding_full_id = $data['funding_full_id'];
            $toInsert->total_part = $data['total_part'];
            $toInsert->female_part = $data['female_part'];
            $toInsert->funding_part_id = $data['funding_part_id'];
            $toInsert->total_forigne = $data['total_forigne'];
            $toInsert->female_forigne = $data['female_forigne'];
            $toInsert->save();
            return response()->json($toInsert, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
