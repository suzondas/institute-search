<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Designations_college of Inst type 3*/
$desigTech = $resourcePath . 'designationTech.json';
$desigList = json_decode(file_get_contents($desigTech), true);

//Loading Board Exam list
$examLevel = [
    ["level"=>"এসএসসি(২০২০)","level_id"=>"13","exam"=>
        [
            ["exam_id"=>"1","subject"=>"5110","education_level_id"=>"13", "name"=>"এসএসসি(ভোক)"]
        ]
    ],
    ["level"=>"এইচএসসি(২০২০)","level_id"=>"31","exam"=>
        [
            ["exam_id"=>"3","subject"=>"5212","education_level_id"=>"31", "name"=>"এইচএসসি(ভোক)"],
            ["exam_id"=>"3","subject"=>"5412","education_level_id"=>"31", "name"=>"এইচএসসি(বিএম)"],
        ]
    ]

];

$examList = [
    ["exam_id"=>"1","subject"=>"5110","education_level_id"=>"51", "name"=>"এসএসসি(ভোক)"],
    ["exam_id"=>"3","subject"=>"5212","education_level_id"=>"52", "name"=>"এইচএসসি(ভোক)"],
    ["exam_id"=>"3","subject"=>"5412","education_level_id"=>"54", "name"=>"এইচএসসি(বিএম)"]
];