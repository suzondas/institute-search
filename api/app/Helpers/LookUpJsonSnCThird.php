<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Lookup_Upajatis Table data stored as Json
$upajatiFile = $resourcePath . 'upajati.json';
$upajatiList = json_decode(file_get_contents($upajatiFile), true);

//loading Lookup_category_student Table data stored as Json
$categoryWiseFile = $resourcePath . 'categoryWise.json';
$categoryWiseList = json_decode(file_get_contents($categoryWiseFile), true);

//loading Lookup_disability Table data stored as Json
$disableCategoryFile = $resourcePath . 'disability.json';
$disableCategory = json_decode(file_get_contents($disableCategoryFile), true);


?>