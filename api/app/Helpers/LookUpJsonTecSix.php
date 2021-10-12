<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classTec.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);

//loading Guardian Occupation Table data stored as Json
$guardianOccupationFile = $resourcePath . 'guardianOccupation.json';
$occupationsList = json_decode(file_get_contents($guardianOccupationFile), true);

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