<?php
/*Todo: unnecessary columns should be removed*/

$resourcePath = resource_path() . '/jsonData/';


//loading teacher_qualification of Inst type 5*/
$teachQuali = $resourcePath . 'teacherQualification.json';
$qualiList = json_decode(file_get_contents($teachQuali), true);

//loading higherDegreeTeach of Inst type 5*/
$teachHd = $resourcePath . 'higherDegreeTeach.json';
$hdList = json_decode(file_get_contents($teachHd), true);

//loading higherDegreeTrain of Inst type 5*/
$teachTr = $resourcePath . 'higherDegreeTrain.json';
$hdTrList = json_decode(file_get_contents($teachTr), true);

?>