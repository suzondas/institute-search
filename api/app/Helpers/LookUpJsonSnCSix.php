<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Designations_college of Inst type 3*/
$desigCol = $resourcePath . 'designationScNCollege.json';
$desigList = json_decode(file_get_contents($desigCol), true);

//loading desigVocList of Inst type 3*/
$desigVoc = $resourcePath . 'designationVoc.json';
$desigVocList = json_decode(file_get_contents($desigVoc), true);

//loading teacher_qualification of Inst type 3*/
$teachQuali = $resourcePath . 'teacherQualification.json';
$qualiList = json_decode(file_get_contents($teachQuali), true);

//loading higherDegreeTeach of Inst type 3*/
$teachHd = $resourcePath . 'higherDegreeTeach.json';
$hdList = json_decode(file_get_contents($teachHd), true);

//loading higherDegreeTrain of Inst type 3*/
$teachTr = $resourcePath . 'higherDegreeTrain.json';
$hdTrList = json_decode(file_get_contents($teachTr), true);

?>