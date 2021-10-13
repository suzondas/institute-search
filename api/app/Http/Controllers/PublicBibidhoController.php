<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/27/2021
 * Time: 5:46 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes_researchs;
use App\Models\Institutes_expenses;
use App\Models\Institutes_incomes;
use App\Models\Covid_infos;

class PublicBibidhoController extends Controller
{
    public function index($inst_id){

        $err = [];
        $data = new \stdClass();
        //loading Local Json Data

        /*institutes_land_usage*/
        $institutes_researchs = Institutes_researchs::where(['institute_id'=>$inst_id])->first();
        if (empty($institutes_researchs)) {
            $toInsertArr['institute_id'] = $inst_id;
            try {
                Institutes_researchs::insert($toInsertArr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Institutes_researchs Data');
            }
            /*Now Return ALl Institutes_researchs rows*/
            $institutes_researchs = Institutes_researchs::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_researchs = $institutes_researchs;

        /*Institutes_expenses*/
        $institutes_expenses = Institutes_expenses::where(['institute_id' => $inst_id])->first();
        if (empty($institutes_expenses)) {
            $toInsertArr['institute_id'] = $inst_id;
            try {
                Institutes_expenses::insert($toInsertArr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Institutes_expenses Data');
            }
            /*Now Return ALl Institutes_expenses rows*/
            $institutes_expenses = Institutes_expenses::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_expenses = $institutes_expenses;
        /*Institutes_expenses  Ends*/

        /*Institutes_incomes*/
        $institutes_incomes = Institutes_incomes::where(['institute_id' => $inst_id])->first();
        if (empty($institutes_incomes)) {
            $toInsertArr['institute_id'] = $inst_id;
            try {
                Institutes_incomes::insert($toInsertArr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Institutes_expenses Data');
            }
            /*Now Return ALl Institutes_expenses rows*/
            $institutes_incomes = Institutes_incomes::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_incomes = $institutes_incomes;
        /*Institutes_incomes  Ends*/

        /*Covid_infos*/
        $covid_infos = Covid_infos::where(['institute_id'=>$inst_id])->first();
        if(empty($covid_infos)){
            $toInsertArr['institute_id'] = $inst_id;
            Covid_infos::insert($toInsertArr);
            $covid_infos = Covid_infos::where(['institute_id' => $inst_id])->first();
        }
        $data->covid_infos=$covid_infos;
        /*Covid_infos*/

        return response()->json($data);
    }

}
