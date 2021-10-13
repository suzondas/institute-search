<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institutes_land_usage;
use App\Models\Univ_building_dtls;
use App\Models\Lookup_uni_rooms;
use App\Models\Institutes_libraries;

class PrivateComSecondPageController extends Controller
{
    public function index($inst_id){

        $err = [];
        $data = new \stdClass();
        //loading Local Json Data
        require_once app()->basePath('app').'/Helpers/LookUpJsonPubUnivComSecond.php';

        /*institutes_land_usage*/
        $institutes_land_usage = Institutes_land_usage::where(['institute_id'=>$inst_id])->first();
        if (empty($institutes_land_usage)) {
            $toInsertArr['institute_id'] = $inst_id;
            try {
                Institutes_land_usage::insert($toInsertArr);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Institutes_land_usage Table');
            }
            /*Now Return ALl $institutes_land_usage rows*/
            $institutes_land_usage = Institutes_land_usage::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_land_usage = $institutes_land_usage;

        /*Univ_building_dtls own*/
        //$data->rooms=Lookup_uni_rooms::get();
        $data->pubRoomLists=$pubRoomLists;
        $univ_building_dtls_own = Univ_building_dtls::where(['institute_id'=>$inst_id])->where(['building_type'=>'OWN'])->orderby('room_id')->get();
        if ($univ_building_dtls_own->isEmpty()) {
            $toAddRoomData = [];
            foreach ($pubRoomLists as $pubRoomList) {
                $toInsertArrRm = [];
                $toInsertArrRm['institute_id'] = $inst_id;
                $toInsertArrRm['building_type'] = 'OWN';
                $toInsertArrRm['room_id'] = $pubRoomList['room_id'];
                array_push($toAddRoomData, $toInsertArrRm);
            }
            try {
                Univ_building_dtls::insert($toAddRoomData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Building Details Table');
            }

            /*Now Return ALl Building_details rows*/
            $univ_building_dtls_own = Univ_building_dtls::where(['institute_id' => $inst_id])->where(['building_type'=>'OWN'])->orderby('room_id')->get();
        }
        $data->univ_building_dtls_own = $univ_building_dtls_own;

        /*Univ_building_dtls rent*/
        //$data->rooms=Lookup_uni_rooms::get();
        $univ_building_dtls_rent = Univ_building_dtls::where(['institute_id'=>$inst_id])->where(['building_type'=>'RENT'])->orderby('room_id')->get();
        if ($univ_building_dtls_rent->isEmpty()) {
            $toAddRoomData = [];
            foreach ($pubRoomRentLists as $pubRoomList) {
                $toInsertArrRmr = [];
                $toInsertArrRmr['institute_id'] = $inst_id;
                $toInsertArrRmr['building_type'] = 'RENT';
                $toInsertArrRmr['room_id'] = $pubRoomList['room_id'];
                array_push($toAddRoomData, $toInsertArrRmr);
            }
            try {
                Univ_building_dtls::insert($toAddRoomData);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Building Details Table');
            }

            /*Now Return ALl Building_details rows*/
            $univ_building_dtls_rent = Univ_building_dtls::where(['institute_id' => $inst_id])->where(['building_type'=>'RENT'])->orderby('room_id')->get();
        }
        $data->univ_building_dtls_rent = $univ_building_dtls_rent;

        /*Institutes_libraries*/
        $institutes_libraries = Institutes_libraries::where(['institute_id' => $inst_id])->first();
        if (empty($institutes_libraries)) {
            $toInsertArrLb['institute_id'] = $inst_id;
            try {
                Institutes_libraries::insert($toInsertArrLb);
            } catch (\Exception $e) {
                array_push($err, 'Could Not Save Institutes_libraries Table');
            }
            /*Now Return ALl Institutes_libraries rows*/
            $institutes_libraries = Institutes_libraries::where(['institute_id' => $inst_id])->first();
        }
        $data->institutes_libraries = $institutes_libraries;
        /*Institutes_libraries  Ends*/
        return response()->json($data);
    }

}
