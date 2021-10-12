<?php
/*Todo: unnecessary columns should be removed*/
$resourcePath = resource_path() . '/jsonData/';
//loading Class Table data stored as Json
$classFile = $resourcePath . 'classProfessional.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
?>