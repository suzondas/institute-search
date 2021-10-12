<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';

//loading Designations_college of Inst type 2*/
$desigCol = $resourcePath . 'designationMadrasah.json';
$desigList = json_decode(file_get_contents($desigCol), true);

//loading desigVocList of Inst type 2*/
$desigVoc = $resourcePath . 'designationVoc.json';
$desigVocList = json_decode(file_get_contents($desigVoc), true);

//loading teacher_qualification of Inst type 2*/
$teachQuali = $resourcePath . 'teacherQualification.json';
$qualiList = json_decode(file_get_contents($teachQuali), true);

//loading higherDegreeTeach of Inst type 2*/
$teachHd = $resourcePath . 'higherDegreeTeach.json';
$hdList = json_decode(file_get_contents($teachHd), true);

//loading higherDegreeTeach of Inst type 2*/
$teachHdMad = $resourcePath . 'higherDegreeTeachMad.json';
$hdListMad = json_decode(file_get_contents($teachHdMad), true);

//loading higherDegreeTrain of Inst type 2*/
$teachTr = $resourcePath . 'higherDegreeTrain.json';
$hdTrList = json_decode(file_get_contents($teachTr), true);

?>