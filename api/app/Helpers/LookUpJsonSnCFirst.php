<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classSnC.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
//        return response()->json($classesJsonData);

/* $classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [11,12,13,31, 32, 33, 34, 51, 52, 54, 91, 93])->with('groups')
            ->get(['class_id', 'education_level_id', 'class_name_bangla']);
return response()->json($classTableWithGroupsToJSON);*/


?>