<?php
$resourcePath = resource_path() . '/jsonData/';
//loading Class Table data stored as Json
$classFile = $resourcePath . 'classMedical.json';
$classesJsonData = json_decode(file_get_contents($classFile), true);
//loading Lookup_disability Table data stored as Json
$disableCategoryFile = $resourcePath . 'disability.json';
$disableCategory = json_decode(file_get_contents($disableCategoryFile), true);
?>