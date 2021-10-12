<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Subjects of Inst type 2*/
$subjects = $resourcePath . 'subjectMadrasah.json';
$subjectList = json_decode(file_get_contents($subjects), true);

?>