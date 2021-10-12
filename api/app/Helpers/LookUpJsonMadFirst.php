<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classMad.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
//        return response()->json($classesJsonData);

/* $classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [20, 21, 22, 23, 24, 51, 52, 54, 91, 93])->with('groups')
            ->orderby('class_id')->get(['class_id', 'education_level_id', 'class_name_bangla']);

        $classTableWithGroupsData=[];
        foreach ($classTableWithGroupsToJSON as $val){
            if(in_array($val->class_id, array(2106,2107,2108))){
                unset($val->groups);
                $val->groups=[];
            }
            $classTableWithGroupsData[]=$val;
        }
        return response()->json($classTableWithGroupsData);*/


?>