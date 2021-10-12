<?php

/*Todo: unnecessary columns should be removed*/

use App\Models\Classes;
use App\Models\Lookup_ssc_voc;

$resourcePath = resource_path() . '/jsonData/';

//require_once app()->basePath('app') . '/Helpers/LookUpJsonTecThird.php';
//$sscTradeList = Lookup_ssc_voc::whereIn('cur_id', ['30'])->orderby('cur_id')->get(); //load data from json
//return response()->json($sscTradeList);

//loading dipCommerce of Inst type 5*/
$dipCommerce = $resourcePath . 'dipCommerce.json';
$dipCommerceList = json_decode(file_get_contents($dipCommerce), true);

//loading dipEng of Inst type 5*/
$dipEng = $resourcePath . 'dipEng.json';
$dipEngList = json_decode(file_get_contents($dipEng), true);

//loading national skill of Inst type 5*/
$certificate = $resourcePath . 'certificate.json';
$certificateList = json_decode(file_get_contents($certificate), true);


