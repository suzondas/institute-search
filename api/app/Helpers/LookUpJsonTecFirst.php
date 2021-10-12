<?php
/*Todo: unnecessary columns should be removed*/

use App\Models\Classes;

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classTec.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
//        return response()->json($classesJsonData);

/*    $classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [50,51,52,54,67,99])->with('groups')
            ->orderby('class_id')->get(['class_id', 'education_level_id','class_code','class_name_bangla']);
        return response()->json($classTableWithGroupsToJSON);

        $classTableWithGroupsData=[];
        foreach ($classTableWithGroupsToJSON as $val){
            if(in_array($val->class_id, array(2106,2107,2108))){
                unset($val->groups);
                $val->groups=[];
            }
            $classTableWithGroupsData[]=$val;
        }
        return response()->json($classTableWithGroupsData);
*/
?>