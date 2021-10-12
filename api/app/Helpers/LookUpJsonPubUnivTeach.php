<?php
/**
 * Created by PhpStorm.
 * User: liazm
 * Date: 7/27/2021
 * Time: 4:15 PM
 */
$resourcePath = resource_path() . '/jsonData/';

//$data->univ_desig=Univ_designations::where(['designation_type'=>'ts'])->orderby('designation_id')->get();
//$data->univ_desig=Univ_designations::orderby('designation_id')->get();
//return response()->json($data->univ_desig);die;

//loading Lookup_uni_rooms Table data stored as Json
$univDesig = $resourcePath . 'univDesig.json';
$univDesigLists = json_decode(file_get_contents($univDesig), true);

$univDesigResident = $resourcePath . 'univDesigResident.json';
$univDesigResidentLists = json_decode(file_get_contents($univDesigResident), true);

$univDesigStaff = $resourcePath . 'univDesigStaff.json';
$univDesigStaffLists = json_decode(file_get_contents($univDesigStaff), true);

$univDesigAll = $resourcePath . 'univDesigAll.json';
$univDesigAllLists = json_decode(file_get_contents($univDesigAll), true);