<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 4:40 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ_country_wise_stds;


class PrivateStdSecondPageController extends Controller
{

    public function index($inst_id)
    {
        $data = new \stdClass();
        /*Foreign_univ_institutes*/
        $data->univ_country_wise_stds = Univ_country_wise_stds::where(['institute_id' => $inst_id])->get();
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
        $univ_country_wise_stds = $data["univ_country_wise_stds"];
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

    public function removeForeignStd($id)
    {
        try {
            Univ_country_wise_stds::where('id', $id)->delete(); // delete previous data
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
        return response()->json('Success', 200);
    }

    public function addForeignStd(Request $request)
    {
        $data = json_decode($request->getContent(), true);//converting json request to php array
        try {
            $toInsert = new Univ_country_wise_stds();
            $toInsert->institute_id = $data['institute_id'];
            $toInsert->country_name = $data['country_name'];
            $toInsert->scholarship_name = $data['scholarship_name'];
            $toInsert->total_honors1 = $data['total_honors1'];
            $toInsert->female_honors1 = $data['female_honors1'];
            $toInsert->total_honors2 = $data['total_honors2'];
            $toInsert->female_honors2 = $data['female_honors2'];
            $toInsert->total_honors3 = $data['total_honors3'];
            $toInsert->female_honors3 = $data['female_honors3'];
            $toInsert->total_honors4 = $data['total_honors4'];
            $toInsert->female_honors4 = $data['female_honors4'];
            $toInsert->total_honors5 = $data['total_honors5'];
            $toInsert->female_honors5 = $data['female_honors5'];
            $toInsert->total_honors6 = $data['total_honors6'];
            $toInsert->female_honors6 = $data['female_honors6'];
            $toInsert->total_honors7 = $data['total_honors7'];
            $toInsert->female_honors7 = $data['female_honors7'];
            $toInsert->total_honors8 = $data['total_honors8'];
            $toInsert->female_honors8 = $data['female_honors8'];
            $toInsert->total_honors9 = $data['total_honors9'];
            $toInsert->female_honors9 = $data['female_honors9'];
            $toInsert->total_honors10 = $data['total_honors10'];
            $toInsert->female_honors10 = $data['female_honors10'];
            $toInsert->total_honors11 = $data['total_honors11'];
            $toInsert->female_honors11 = $data['female_honors11'];
            $toInsert->total_honors12 = $data['total_honors12'];
            $toInsert->female_honors12 = $data['female_honors12'];
            $toInsert->total_masters1 = $data['total_masters1'];
            $toInsert->female_masters1 = $data['female_masters1'];
            $toInsert->total_masters2 = $data['total_masters2'];
            $toInsert->female_masters2 = $data['female_masters2'];
            $toInsert->total_masters3 = $data['total_masters3'];
            $toInsert->female_masters3 = $data['female_masters3'];
            $toInsert->total_masters4 = $data['total_masters4'];
            $toInsert->female_masters4 = $data['female_masters4'];
            $toInsert->total_masters5 = $data['total_masters5'];
            $toInsert->female_masters5 = $data['female_masters5'];
            $toInsert->total_masters6 = $data['total_masters6'];
            $toInsert->female_masters6 = $data['female_masters6'];
            $toInsert->total_msc = $data['total_msc'];
            $toInsert->female_msc = $data['female_msc'];
            $toInsert->total_mphil = $data['total_mphil'];
            $toInsert->total_phd = $data['total_phd'];
            $toInsert->total_student = $data['total_student'];
            $toInsert->female_student = $data['female_student'];
            $toInsert->save();
            return response()->json($toInsert, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
