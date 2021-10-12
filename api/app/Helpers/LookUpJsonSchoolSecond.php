<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classSchool.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
//        return response()->json($classesJsonData);

/*$classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [11,12,13])->with('groups')
    ->get(['class_id', 'education_level_id', 'class_name_bangla']);
return response()->json($classTableWithGroupsToJSON);*/

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