<?php

/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classSnC.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);

/* $classTableWithGroupsToJSON = Classes::whereIn('education_level_id', [11,12,13,31, 32, 33, 34, 51, 52, 54, 91, 93])->with('groups')
            ->get(['class_id', 'education_level_id', 'class_name_bangla']);
return response()->json($classTableWithGroupsToJSON);*/

//loading sscVocTrade of Inst type 4*/
$sscTrade = $resourcePath . 'sscVoc.json';
$sscTradeList = json_decode(file_get_contents($sscTrade), true);

//loading hscVocTrade of Inst type 4*/
$hscTrade = $resourcePath . 'hscVoc.json';
$hscTradeList = json_decode(file_get_contents($hscTrade), true);

//loading hscBm of Inst type 4*/
$hscBm = $resourcePath . 'hscBm.json';
$hscBmList = json_decode(file_get_contents($hscBm), true);

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
    ],
    ["level"=>"এইচএসসি(২০২০)","level_id"=>"31","exam"=>
        [["exam_id"=>"3","subject"=>"3101","education_level_id"=>"31","name"=>"মানবিক"],
            ["exam_id"=>"3","subject"=>"3102","education_level_id"=>"31", "name"=>"বিজ্ঞান"],
            ["exam_id"=>"3","subject"=>"3103","education_level_id"=>"31", "name"=>"ব্যাবসায় শিক্ষা"],
            ["exam_id"=>"3","subject"=>"5212","education_level_id"=>"31", "name"=>"এইচএসসি(ভোক)"],
            ["exam_id"=>"3","subject"=>"5412","education_level_id"=>"31", "name"=>"এইচএসসি(বিএম)"],
        ]
    ]

];

$examList = [
    ["exam_id"=>"2","subject"=>"1208","education_level_id"=>"12","name"=>""],
    ["exam_id"=>"1","subject"=>"1301","education_level_id"=>"13","name"=>"মানবিক"],
    ["exam_id"=>"1","subject"=>"1302","education_level_id"=>"13", "name"=>"বিজ্ঞান"],
    ["exam_id"=>"1","subject"=>"1303","education_level_id"=>"13", "name"=>"ব্যাবসায় শিক্ষা"],
    ["exam_id"=>"1","subject"=>"5110","education_level_id"=>"51", "name"=>"এসএসসি(ভোক)"],
    ["exam_id"=>"3","subject"=>"3101","education_level_id"=>"31","name"=>"মানবিক"],
    ["exam_id"=>"3","subject"=>"3102","education_level_id"=>"31", "name"=>"বিজ্ঞান"],
    ["exam_id"=>"3","subject"=>"3103","education_level_id"=>"31", "name"=>"ব্যাবসায় শিক্ষা"],
    ["exam_id"=>"3","subject"=>"5212","education_level_id"=>"52", "name"=>"এইচএসসি(ভোক)"],
    ["exam_id"=>"3","subject"=>"5412","education_level_id"=>"54", "name"=>"এইচএসসি(বিএম)"]
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