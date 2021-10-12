<?php
/*Todo: unnecessary columns should be removed*/

use App\Models\Classes;

$resourcePath = resource_path() . '/jsonData/';

$classFile = $resourcePath . 'classTec.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);

//loading sscVocTrade of Inst type 5*/
$sscTrade = $resourcePath . 'sscVoc.json';
$sscTradeList = json_decode(file_get_contents($sscTrade), true);

//loading hscVocTrade of Inst type 5*/
$hscTrade = $resourcePath . 'hscVoc.json';
$hscTradeList = json_decode(file_get_contents($hscTrade), true);

//loading hscBm of Inst type 5*/
$hscBm = $resourcePath . 'hscBm.json';
$hscBmList = json_decode(file_get_contents($hscBm), true);


?>