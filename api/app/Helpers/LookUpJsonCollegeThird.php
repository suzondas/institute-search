<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classes.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
//        return response()->json($classesJsonData);

/*$classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [31, 32, 33, 34, 52, 54, 91, 93])->with('groups')
    ->get(['class_id', 'education_level_id', 'class_name_bangla']);
return response()->json($classTableWithGroupsToJSON);*/

//loading Guardian Occupation Table data stored as Json
$guardianOccupationFile = $resourcePath . 'guardianOccupation.json';
$occupationsList = json_decode(file_get_contents($guardianOccupationFile), true);

//loading Subjects of Inst type 3*/
$subjects = $resourcePath . 'subjectCollege.json';
$subjectList = json_decode(file_get_contents($subjects), true);

?>