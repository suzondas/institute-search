<?php
/*Todo: unnecessary columns should be removed*/

use App\Models\Lookup_subjectdtl;

$resourcePath = resource_path() . '/jsonData/';

//loading Lookup_category_student Table data stored as Json
$categoryWiseFile = $resourcePath . 'categoryWiseEng.json';
$categoryWiseList = json_decode(file_get_contents($categoryWiseFile), true);

//loading Lookup_disability Table data stored as Json
$disableCategoryFile = $resourcePath . 'disability.json';
$disableCategory = json_decode(file_get_contents($disableCategoryFile), true);

//$data->subjectList = Lookup_subjectdtl::where(['INSTITUTE_TYPE_ID' => 9])->get();
//return response()->json( $data->subjectList);
//loading Subjects of Inst type 9*/
$subjects = $resourcePath . 'subjectEng.json';
$subjectList = json_decode(file_get_contents($subjects), true);

//Loading Board Exam list
$examLevel = [

    ["level"=>"ও-লেভেল","level_id"=>"98","exam"=>
        [["exam_id"=>"18","subject"=>"9811","education_level_id"=>"98", "name"=>"2018"],
            ["exam_id"=>"18","subject"=>"9813","education_level_id"=>"98", "name"=>"2019"],
        ]
    ],
    ["level"=>"এ-লেভেল","level_id"=>"98","exam"=>
        [
            ["exam_id"=>"19","subject"=>"9812","education_level_id"=>"98", "name"=>"2018"],
            ["exam_id"=>"19","subject"=>"9814","education_level_id"=>"98", "name"=>"2019"],
        ]
    ],
];

$examList = [
    ["exam_id"=>"18","subject"=>"9811","education_level_id"=>"98","name"=>"ও-লেভেল-২০১৮"],
    ["exam_id"=>"18","subject"=>"9813","education_level_id"=>"98","name"=>"ও-লেভেল-২০১৯"],
    ["exam_id"=>"19","subject"=>"9812","education_level_id"=>"98", "name"=>"এ-লেভেল-২০১৮"],
    ["exam_id"=>"19","subject"=>"9814","education_level_id"=>"98", "name"=>"এ-লেভেল-২০১৯"],
];
?>