<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classSchool.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
//       return response()->json($classesJsonData);

/*$classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [11,12,13])->with('groups')
    ->get(['class_id', 'education_level_id', 'class_name_bangla']);
return response()->json($classTableWithGroupsToJSON);*/

//loading Guardian Occupation Table data stored as Json
$guardianOccupationFile = $resourcePath . 'guardianOccupation.json';
$occupationsList = json_decode(file_get_contents($guardianOccupationFile), true);

//loading Lookup_subjectdtl Table data stored as Json
$subjectFile = $resourcePath . 'subjectSchool.json';
$subjectList = json_decode(file_get_contents($subjectFile), true);

?>