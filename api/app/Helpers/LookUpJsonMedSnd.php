<?php
$resourcePath = resource_path() . '/jsonData/';
//loading teacher_qualification of Professional*/
$teachQuali = $resourcePath . 'teacherQualificationMed.json';
$qualiList = json_decode(file_get_contents($teachQuali), true);
//loading Designations for Professional*/
$desigTech = $resourcePath . 'designationTechMedical.json';
$desigList = json_decode(file_get_contents($desigTech), true);
?>