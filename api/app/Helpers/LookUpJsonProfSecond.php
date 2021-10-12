<?php
$resourcePath = resource_path() . '/jsonData/';
//loading Lookup_disability Table data stored as Json
$disableCategoryFile = $resourcePath . 'disability.json';
$disableCategory = json_decode(file_get_contents($disableCategoryFile), true);
?>