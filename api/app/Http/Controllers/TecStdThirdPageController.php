<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lookup_diploma;
use App\Models\Lookup_ssc_voc;
use App\Models\Dip_commerce_std_summaries;
use App\Models\Dip_enhlstds;
use App\Models\Certficate_crs_stds;
use App\Models\Inst_curriculums;


class TecStdThirdPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        require_once app()->basePath('app') . '/Helpers/LookUpJsonTecThird.php';
        $toInsertArr = [];

        /*Inst_curriculums needed for enable and disable curriculumn table*/
        $data->instCurriculums = Inst_curriculums::where(['institute_id'=>$inst_id])->first();

        /*Dip_commerce_std_summaries Students*/
        if($data->instCurriculums->el_dip_commerce==1) {
            $dipCommerceStd = Dip_commerce_std_summaries::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            if ($dipCommerceStd->isEmpty()) {
                $toAddedDipCom = [];
                foreach ($dipCommerceList as $trade) {
                    $toInsertArr = [];
                    $toInsertArr['institute_id'] = $inst_id;
                    $toInsertArr['cur_id'] = $trade['cur_id'];
                    $toInsertArr['trade_code'] = $trade['trade_code'];
                    $toInsertArr['trade_name'] = $trade['trade_name'];
                    array_push($toAddedDipCom, $toInsertArr);
                }
                try {
                    Dip_commerce_std_summaries::insert($toAddedDipCom);
                } catch (\Exception $e) {
                    array_push($err, 'Could Not Save Dip_commerce_std_summaries Table');
                }
                /*Now Return HSCVOC rows*/
                $dipCommerceStd = Dip_commerce_std_summaries::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            }
            $data->dipCommerceStd = $dipCommerceStd;
        }else{
            $data->dipCommerceStd = [];
        }

        /*Dip_enhlstds Students*/

        if($data->instCurriculums->el_dip_tech_education==1 or $data->instCurriculums->el_dip_voc_education==1
            or $data->instCurriculums->el_dip_engineering==1 or $data->instCurriculums->el_dip_textile==1
            or $data->instCurriculums->el_dip_agriculture==1 or $data->instCurriculums->el_dip_fisheries==1
            or $data->instCurriculums->el_dip_fisheries_service==1 or $data->instCurriculums->el_dip_forestry==1
            or $data->instCurriculums->el_dip_forestry_service==1 or $data->instCurriculums->el_dip_livestock==1
            or $data->instCurriculums->el_dip_medical_tech==1 or $data->instCurriculums->el_dip_naval==1
            or $data->instCurriculums->el_dip_army==1 or $data->instCurriculums->el_dip_tourism==1
            or $data->instCurriculums->el_dip_ultrasound==1 or $data->instCurriculums->el_dip_animal_service==1
            or $data->instCurriculums->el_prof_dip_automobile==1){

        $dipEnHlStd = Dip_enhlstds::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
        if ($dipEnHlStd->isEmpty()) {
            $toAddedDipEnHl = [];
            foreach ($dipEngList as $trade) {
                $toInsertArrCr = [];
                $toInsertArrCr['institute_id'] = $inst_id;
                $toInsertArrCr['cur_id'] = $trade['cur_id'];
                $toInsertArrCr['trade_code'] = $trade['trade_code'];
                $toInsertArrCr['trade_name'] = $trade['trade_name'];
                array_push($toAddedDipEnHl, $toInsertArrCr);
            }
            try {
                Dip_enhlstds::insert($toAddedDipEnHl);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Dip_enhlstds Table');
            }
            /*Now Return Dip_enhlstds rows*/
            $dipEnHlStd = Dip_enhlstds::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
        }
        $data->dipEnHlStd = $dipEnHlStd;
        } else{
            $data->dipEnHlStd = [];
        }

        /*Certficate_crs_stds Students*/

        if($data->instCurriculums->el_certificate_marine==1 or $data->instCurriculums->el_skill_certificate==1
            or $data->instCurriculums->el_certificate_voc==1 or $data->instCurriculums->el_certificate_health==1
            or $data->instCurriculums->el_certificate_poultry==1 or $data->instCurriculums->el_certificate_animal_health==1
            or $data->instCurriculums->el_certificate_ultrasound==1 or $data->instCurriculums->el_advanced_certificate==1
            ) {
            $dipCertStd = Certficate_crs_stds::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            if ($dipCertStd->isEmpty()) {
                $toAddedCertificate = [];
                foreach ($certificateList as $trade) {
                    $toInsertArrCrs = [];
                    $toInsertArrCrs['institute_id'] = $inst_id;
                    $toInsertArrCrs['cur_id'] = $trade['cur_id'];
                    $toInsertArrCrs['trade_code'] = $trade['trade_code'];
                    $toInsertArrCrs['trade_name'] = $trade['trade_name'];
                    array_push($toAddedCertificate, $toInsertArrCrs);
                }
                try {
                    Certficate_crs_stds::insert($toAddedCertificate);
                } catch (\Exception $e) {
                    array_push($err, 'Could Not Save Certficate_crs_stds Table');
                }
                /*Now Return Dip_enhlstds rows*/
                $dipCertStd = Certficate_crs_stds::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            }
            $data->dipCertStd = $dipCertStd;
        }else{
            $data->dipCertStd = [];
        }
        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

    public function submitData(Request $request)
    {
        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $dipCommerceStd = $data["dipCommerceStd"];
        $dipEnHlStd = $data["dipEnHlStd"];
        $dipCertStd = $data["dipCertStd"];

        /*==================Parsing Table wise data from Array End=======*/

        /* saving Dip_commerce_std_summaries */
        if(!empty($dipCommerceStd)){
            try {
                Dip_commerce_std_summaries::where('institute_id', $instId)->delete();
                Dip_commerce_std_summaries::insert($dipCommerceStd);
            } catch (\Exception $e) {
                array_push($err, $e);
            }
        }

        /* saving Dip_enhlstds */
        if(!empty($dipEnHlStd)){
            try {
                Dip_enhlstds::where('institute_id', $instId)->delete();
                Dip_enhlstds::insert($dipEnHlStd);
            } catch (\Exception $e) {
                array_push($err, $e);
            }
        }

        /* saving Certficate_crs_stds */
        if(!empty($dipCertStd)){
            try {
                Certficate_crs_stds::where('institute_id', $instId)->delete();
                Certficate_crs_stds::insert($dipCertStd);
            } catch (\Exception $e) {
                array_push($err, $e);
            }
        }

        if (sizeof($err) > 0) {
            return response()->json($err, 500);
        } else {
            return response()->json("success", 200);
        }
    }


}
