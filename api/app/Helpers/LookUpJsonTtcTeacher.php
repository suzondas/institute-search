<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Designations_college of Inst type 1*/
$desigTtc = $resourcePath . 'designationTtc.json';
$desigList = json_decode(file_get_contents($desigTtc), true);

//loading desigVocList of Inst type 1*/
$desigVoc = $resourcePath . 'designationVoc.json';
$desigVocList = json_decode(file_get_contents($desigVoc), true);

//loading teacher_qualification of Inst type 1*/
$teachQuali = $resourcePath . 'teacherQualification.json';
$qualiList = json_decode(file_get_contents($teachQuali), true);

//loading higherDegreeTeach of Inst type 1*/
$teachHd = $resourcePath . 'higherDegreeTeach.json';
$hdList = json_decode(file_get_contents($teachHd), true);

//loading higherDegreeTrain of Inst type 1*/
$teachTr = $resourcePath . 'higherDegreeTrain.json';
$hdTrList = json_decode(file_get_contents($teachTr), true);

?>
