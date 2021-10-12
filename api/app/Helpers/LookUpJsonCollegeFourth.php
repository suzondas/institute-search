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



//loading hscVocTrade of Inst type 3*/
$hscTrade = $resourcePath . 'hscVoc.json';
$hscTradeList = json_decode(file_get_contents($hscTrade), true);

//loading hscBm of Inst type 3*/
$hscBm = $resourcePath . 'hscBm.json';
$hscBmList = json_decode(file_get_contents($hscBm), true);

//Loading Board Exam list
$examLevel = [
    ["level"=>"এইচএসসি","level_id"=>"31","exam"=>
        [["exam_id"=>"3","subject"=>"3101","education_level_id"=>"31","name"=>"মানবিক"],
            ["exam_id"=>"3","subject"=>"3102","education_level_id"=>"31", "name"=>"বিজ্ঞান"],
            ["exam_id"=>"3","subject"=>"3103","education_level_id"=>"31", "name"=>"ব্যাবসায় শিক্ষা"]]
    ],
    ["level"=>"স্নাতক(পাশ)(সর্বশেষ বছর) চূড়ান্ত","level_id"=>"32","exam"=>
        [["exam_id"=>"4","subject"=>"3201","education_level_id"=>"32", "name"=>"বিএ"],
            ["exam_id"=>"4","subject"=>"3202","education_level_id"=>"32", "name"=>"বিএসএস"],
            ["exam_id"=>"4","subject"=>"3203","education_level_id"=>"32", "name"=>"বিএসসি"],
            ["exam_id"=>"4","subject"=>"3204","education_level_id"=>"32", "name"=>"বিবিএস"]]
    ],
    ["level"=>"স্নাতক(সম্মান)","level_id"=>"33","exam"=>
        [["exam_id"=>"13","subject"=>"3304","education_level_id"=>"33", "name"=>"শেষ বর্ষ পরীক্ষা"]]
    ],
    ["level"=>"স্নাতকোত্তর)","level_id"=>"34","exam"=>
        [["exam_id"=>"5","subject"=>"3402","education_level_id"=>"34", "name"=>"শেষ বর্ষ পরীক্ষা"]]
    ],
];

$examList = [
    ["exam_id"=>"3","subject"=>"3101","education_level_id"=>"31","name"=>"মানবিক"],
    ["exam_id"=>"3","subject"=>"3102","education_level_id"=>"31", "name"=>"বিজ্ঞান"],
    ["exam_id"=>"3","subject"=>"3103","education_level_id"=>"31", "name"=>"ব্যাবসায় শিক্ষা"],
    ["exam_id"=>"4","subject"=>"3201","education_level_id"=>"32", "name"=>"বিএ"],
    ["exam_id"=>"4","subject"=>"3202","education_level_id"=>"32", "name"=>"বিএসএস"],
    ["exam_id"=>"4","subject"=>"3203","education_level_id"=>"32", "name"=>"বিএসসি"],
    ["exam_id"=>"4","subject"=>"3204","education_level_id"=>"32", "name"=>"বিবিএস"],
    ["exam_id"=>"13","subject"=>"3304","education_level_id"=>"33", "name"=>"শেষ বর্ষ পরীক্ষা"],
    ["exam_id"=>"5","subject"=>"3402","education_level_id"=>"34", "name"=>"শেষ বর্ষ পরীক্ষা"],
];

$admitYrList = [
    ["admit_year"=>"2021"],
    ["admit_year"=>"2020"],
    ["admit_year"=>"2019"],
    ["admit_year"=>"2018"],
    ["admit_year"=>"2017"],
];

$resYrList = [
    ["admit_year"=>"2021"],
    ["admit_year"=>"2020"],
    ["admit_year"=>"2019"],
    ["admit_year"=>"2018"],
    ["admit_year"=>"2017"],
    ["admit_year"=>"2016"],
];

?>