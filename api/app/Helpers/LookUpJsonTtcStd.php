<?php

/*Todo: unnecessary columns should be removed*/

use App\Models\Classes;

$resourcePath = resource_path() . '/jsonData/';

//$classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [68])->
//orderby('class_id')->get(['class_id', 'education_level_id', 'class_name_bangla']);
//return response()->json($classTableWithGroupsToJSON);

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classTtc.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);


//loading sscVocTrade of Inst type 4*/
$bedClass = $resourcePath . 'classBed.json';
$bedClassList = json_decode(file_get_contents($bedClass), true);

//Loading Board Exam list
$examLevel = [
    ["level"=>"জেএসসি(২০২০)","level_id"=>"12","exam"=>
        [["exam_id"=>"2","subject"=>"1208","education_level_id"=>"12","name"=>""]]
    ],
    ["level"=>"এসএসসি(২০২০)","level_id"=>"13","exam"=>
        [["exam_id"=>"1","subject"=>"1301","education_level_id"=>"13","name"=>"মানবিক"],
            ["exam_id"=>"1","subject"=>"1302","education_level_id"=>"13", "name"=>"বিজ্ঞান"],
            ["exam_id"=>"1","subject"=>"1303","education_level_id"=>"13", "name"=>"ব্যাবসায় শিক্ষা"],
            ["exam_id"=>"1","subject"=>"5110","education_level_id"=>"13", "name"=>"এসএসসি(ভোক)"]
        ]
    ]

];

$examList = [
    ["exam_id"=>"2","subject"=>"1208","education_level_id"=>"12","name"=>""],
    ["exam_id"=>"1","subject"=>"1301","education_level_id"=>"13","name"=>"মানবিক"],
    ["exam_id"=>"1","subject"=>"1302","education_level_id"=>"13", "name"=>"বিজ্ঞান"],
    ["exam_id"=>"1","subject"=>"1303","education_level_id"=>"13", "name"=>"ব্যাবসায় শিক্ষা"],
    ["exam_id"=>"1","subject"=>"5110","education_level_id"=>"51", "name"=>"এসএসসি(ভোক)"]
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
