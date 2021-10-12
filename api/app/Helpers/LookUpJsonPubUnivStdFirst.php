<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/26/2021
 * Time: 1:20 PM
 */

$resourcePath = resource_path() . '/jsonData/';

//$data->subjects=Lookup_univ_subjects::orderby('subject_id')->get();
//return response()->json($data->subjects);die;

//loading Lookup_uni_rooms Table data stored as Json
$univSub = $resourcePath . 'UnivSubject.json';
$univSubLists = json_decode(file_get_contents($univSub), true);



?>