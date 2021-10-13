<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lookup_ssc_voc;
use App\Models\Nat_skill_std_sums;
use App\Models\Basic_trade_std_sums;
use App\Models\Inst_curriculums;

class TecStdFourthPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();

        require_once app()->basePath('app') . '/Helpers/LookUpJsonTecFourth.php';

        $toInsertArr = [];

        /*Inst_curriculums needed for enable and disable curriculumn table*/
        $data->instCurriculums = Inst_curriculums::where(['institute_id'=>$inst_id])->first();

        /*Nat_skill_stdSums Students*/
        if($data->instCurriculums->el_national_skills2==1 or $data->instCurriculums->el_national_skills3==1) {
            $natSkillStd = Nat_skill_std_sums::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            if ($natSkillStd->isEmpty()) {
                $toAddedNatSkill = [];
                foreach ($nationalSkillList as $trade) {
                    $toInsertArr = [];
                    $toInsertArr['institute_id'] = $inst_id;
                    $toInsertArr['cur_id'] = $trade['cur_id'];
                    $toInsertArr['trade_code'] = $trade['trade_code'];
                    $toInsertArr['trade_name'] = $trade['trade_name'];
                    array_push($toAddedNatSkill, $toInsertArr);
                }
                //Nat_skill_std_sums::insert($toAddedNatSkill);
                // return response()->json($toAddedNatSkill);
                try {
                    Nat_skill_std_sums::insert($toAddedNatSkill);
                } catch (\Exception $e) {
                    array_push($err, 'Could Not Save Nat_skill_stdSums Table');
                }
                /*Now Return Nat_skill_stdSums rows*/
                $natSkillStd = Nat_skill_std_sums::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            }
            $data->natSkillStd = $natSkillStd;
        }else{
            $data->natSkillStd = [];
        }
        /*Basic_trade_std_sums Students*/
        if($data->instCurriculums->el_national_skills360==1 or $data->instCurriculums->el_ntvq==1) {
            $dipBasTradeStd = Basic_trade_std_sums::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            if ($dipBasTradeStd->isEmpty()) {
                $toAddedBasTrade = [];
                foreach ($nationalSkillList as $trade) {
                    $toInsertArrBt = [];
                    $toInsertArrBt['institute_id'] = $inst_id;
                    $toInsertArrBt['cur_id'] = $trade['cur_id'];
                    $toInsertArrBt['trade_code'] = $trade['trade_code'];
                    $toInsertArrBt['trade_name'] = $trade['trade_name'];
                    array_push($toAddedBasTrade, $toInsertArrBt);
                }
                try {
                    Basic_trade_std_sums::insert($toAddedBasTrade);
                } catch (\Exception $e) {
                    array_push($err, 'Could Not Save Basic_trade_std_sums Table');
                }
                /*Now Return Basic_trade_std_sums rows*/
                $dipBasTradeStd = Basic_trade_std_sums::where(['institute_id' => $inst_id])->orderby('trade_code')->get();
            }
            $data->dipBasTradeStd = $dipBasTradeStd;
        }else{
            $data->dipBasTradeStd = [];
        }
        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }


}
