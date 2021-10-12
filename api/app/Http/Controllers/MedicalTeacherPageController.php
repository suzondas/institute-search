<?php

namespace App\Http\Controllers;

use App\Models\Med_teach_gen_info;
use Illuminate\Http\Request;

class MedicalTeacherPageController extends Controller
{

    public function index($inst_id)
    {
        $err = [];
        $data = new \stdClass();
        //loading Local Json Data
        require_once app()->basePath('app') . '/Helpers/LookUpJsonMedSnd.php';
        $data->desigList= $desigList;
        $teacherInfo=Med_teach_gen_info::where(['institute_id'=>$inst_id])->orderby('desig_id')->get();
        if($teacherInfo->isEmpty()){
        $toAddTeacherInfo=[];
        $toAddTeacherInfo['institute_id'] = $inst_id;
        try {
            Med_teach_gen_info::insert($toAddTeacherInfo);
        } catch (\Exception $e) {
            array_push($err, 'Could Not Save Teachers Info');
        }
        $teacherInfo = Med_teach_gen_info::where(['institute_id' => $inst_id])->orderby('desig_id')->get();

    }
        $data->teacherInfo = $teacherInfo;
        /*Adding errors found during inserting rows*/
        $data->error = $err;

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $err = []; //error container for updating the tables
        $data = json_decode($request->getContent(), true);//converting json request to php array
        /*==================Parsing Table wise data from Array=======*/
        $instId = $data["instId"];
        $medicalSubStdSum = $data["medicalSubStdSum"];
        $medicalStdSum = $data["medicalStdSum"];
        $categoryWiseDisableStd = $data["categoryWiseDisableStudent"];
        /*==================Parsing Table wise data from Array End=======*/
        return response($err);
    }



}
