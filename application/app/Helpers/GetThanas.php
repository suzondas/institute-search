<?php
namespace App\Helpers;

use App\Models\Thanas;
use App\Models\Districts;
class GetThanas
{
    public static function GetThanaDtl($thanaId)
    {
        $data = new \stdClass();
        $data->thana = Thanas::find($thanaId);
        $data->district = Districts::find($data->thana->district_id);
        return $data;
    }
}

?>
