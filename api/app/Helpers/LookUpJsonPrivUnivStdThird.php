<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/30/2021
 * Time: 10:44 PM
 */

$resourcePath = resource_path() . '/jsonData/';

//$data->degree_subjects=Pri_univ_courses::orderby('course_id')->get();
//return response()->json($data->degree_subjects);die;

//loading Lookup_uni_rooms Table data stored as Json
$priUnivDegree = $resourcePath . 'priUnivDegree.json';
$priUnivDegreeLists = json_decode(file_get_contents($priUnivDegree), true);

$priUnivDepartment = $resourcePath . 'priUnivDepartment.json';
$priUnivDepartmentLists= json_decode(file_get_contents($priUnivDepartment), true);

$priUnivCrs = $resourcePath . 'priUnivCrs.json';
$priUnivCrsLists= json_decode(file_get_contents($priUnivCrs), true);




