<?php

$resourcePath = resource_path() . '/jsonData/';
//loading Designations_college of Inst type 9*/
$desigEng = $resourcePath . 'designationEng.json';
$desigList = json_decode(file_get_contents($desigEng), true);