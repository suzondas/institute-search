<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Class Table data stored as Json
$classFile = $resourcePath . 'classSnC.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);

//loading Guardian Occupation Table data stored as Json
$guardianOccupationFile = $resourcePath . 'guardianOccupation.json';
$occupationsList = json_decode(file_get_contents($guardianOccupationFile), true);

//loading Subjects of Inst type 4*/
$subjects = $resourcePath . 'subjectSnCollege.json';
$subjectList = json_decode(file_get_contents($subjects), true);

?>