<?php
/*Todo: unnecessary columns should be removed*/

use App\Models\Lookup_uni_rooms;

$resourcePath = resource_path() . '/jsonData/';

//$data->rooms=Lookup_uni_rooms::get();
//return response()->json($data->rooms);die;

//loading Lookup_uni_rooms Table data stored as Json
$pubRooms = $resourcePath . 'pubUnivRoom.json';
$pubRoomLists = json_decode(file_get_contents($pubRooms), true);

$pubRoomRents = $resourcePath . 'pubUnivRoomRent.json';
$pubRoomRentLists = json_decode(file_get_contents($pubRoomRents), true);

?>