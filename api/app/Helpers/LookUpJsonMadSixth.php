<?php

/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classMad.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);


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
    ["level"=>"জেডিসি(২০২০)","level_id"=>"21","exam"=>
        [["exam_id"=>"6","subject"=>"2108","education_level_id"=>"21","name"=>""]]
    ],
    ["level"=>"দাখিল(২০২০)","level_id"=>"21","exam"=>
           [
               ["exam_id"=>"7","subject"=>"2101","education_level_id"=>"21","name"=>"সাধারণ"],
            ["exam_id"=>"7","subject"=>"2102","education_level_id"=>"21", "name"=>"বিজ্ঞান"],
            ["exam_id"=>"7","subject"=>"2103","education_level_id"=>"21", "name"=>"মোজাব্বিদ"],
            ["exam_id"=>"7","subject"=>"2110","education_level_id"=>"21", "name"=>"হিফজুল কুরআন"],
            ["exam_id"=>"15","subject"=>"5115","education_level_id"=>"51", "name"=>"দাখিল(ভোক)"],
            ["exam_id"=>"20","subject"=>"5120","education_level_id"=>"51", "name"=>"এসএসসি (ভোক)"]
        ]
    ],
    ["level"=>"আলিম(২০২০)","level_id"=>"22","exam"=>
        [["exam_id"=>"8","subject"=>"2201","education_level_id"=>"22","name"=>"সাধারণ"],
            ["exam_id"=>"8","subject"=>"2202","education_level_id"=>"22", "name"=>"বিজ্ঞান"],
            ["exam_id"=>"8","subject"=>"2203","education_level_id"=>"22", "name"=>"মোজাব্বিদ মাহির"],
            ["exam_id"=>"17","subject"=>"5412","education_level_id"=>"22", "name"=>"এইচএসসি(বিএম)"]
        ]
    ],
    ["level"=>"ফাজিল(পাস)","level_id"=>"23","exam"=>
        [["exam_id"=>"9","subject"=>"2301","education_level_id"=>"23","name"=>""]]
    ],
    ["level"=>"ফাজিল(সম্মান)","level_id"=>"23","exam"=>
        [["exam_id"=>"9","subject"=>"2302","education_level_id"=>"23","name"=>""]]
    ],
    ["level"=>"কামিল/মাস্টার্স সহ শেষ বর্ষ","level_id"=>"24","exam"=>
        [["exam_id"=>"10","subject"=>"2401","education_level_id"=>"24","name"=>""]]
    ],


];

$examList = [
    ["exam_id"=>"6","subject"=>"2108","education_level_id"=>"21","name"=>""],
    ["exam_id"=>"7","subject"=>"2101","education_level_id"=>"21","name"=>"সাধারণ"],
    ["exam_id"=>"7","subject"=>"2102","education_level_id"=>"21", "name"=>"বিজ্ঞান"],
    ["exam_id"=>"7","subject"=>"2103","education_level_id"=>"21", "name"=>"মোজাব্বিদ"],
    ["exam_id"=>"7","subject"=>"2110","education_level_id"=>"21", "name"=>"হিফজুল কুরআন"],
    ["exam_id"=>"20","subject"=>"5120","education_level_id"=>"51", "name"=>"দাখিল(ভোক)"],
    ["exam_id"=>"8","subject"=>"2201","education_level_id"=>"22","name"=>"সাধারণ"],
    ["exam_id"=>"8","subject"=>"2202","education_level_id"=>"22", "name"=>"বিজ্ঞান"],
    ["exam_id"=>"8","subject"=>"2203","education_level_id"=>"22", "name"=>"মোজাব্বিদ মাহির"],
    ["exam_id"=>"17","subject"=>"5412","education_level_id"=>"22", "name"=>"এইচএসসি(বিএম)"],
    ["exam_id"=>"9","subject"=>"2301","education_level_id"=>"23","name"=>""],
    ["exam_id"=>"9","subject"=>"2302","education_level_id"=>"23","name"=>""],
    ["exam_id"=>"10","subject"=>"2401","education_level_id"=>"24","name"=>""],
];

