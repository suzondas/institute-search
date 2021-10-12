<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 9:53 PM
 */
$resourcePath = resource_path() . '/jsonData/';

//$data->degree_subjects=Univ_degree_subjects::orderby('id')->get();
//return response()->json($data->degree_subjects);die;

//loading Lookup_uni_rooms Table data stored as Json
$univDegSub = $resourcePath . 'univDegreeSub.json';
$univDegreeSubLists = json_decode(file_get_contents($univDegSub), true);

$univDegreeHnrsPass = $resourcePath . 'univDegreeHnrsPass.json';
$univDegHnrsPasLists= json_decode(file_get_contents($univDegreeHnrsPass), true);

$univDegreeHnrsSomman = $resourcePath . 'univDegreeHnrsSomman.json';
$univDegHnrsSommanLists= json_decode(file_get_contents($univDegreeHnrsSomman), true);

$univDegreeTech = $resourcePath . 'univDegreeTech.json';
$univDegreeTechLists= json_decode(file_get_contents($univDegreeTech), true);

$univDegreeMas = $resourcePath . 'univDegreeMas.json';
$univDegreeMasLists= json_decode(file_get_contents($univDegreeMas), true);

$univDegreeMasTec = $resourcePath . 'univDegreeMasTec.json';
$univDegreeMasTecLists= json_decode(file_get_contents($univDegreeMasTec), true);

$univDegreePhd = $resourcePath . 'univDegreePhd.json';
$univDegreePhdLists= json_decode(file_get_contents($univDegreePhd), true);

$univDegreeDiploma = $resourcePath . 'univDegreeDiploma.json';
$univDegreeDiplomaLists= json_decode(file_get_contents($univDegreeDiploma), true);