<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

$classFile = $resourcePath . 'classMad.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);

$secList = [
    ["section_id"=>"ক"],
    ["section_id"=>"খ"],
    ["section_id"=>"গ"],
    ["section_id"=>"ঘ"],
    ["section_id"=>"উ"],
    ["section_id"=>"চ"],
    ["section_id"=>"ছ"]
];

?>