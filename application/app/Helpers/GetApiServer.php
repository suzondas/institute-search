<?php
namespace App\Helpers;


class GetApiServer
{
    private static function isLocalIPAddress()
    {
        $IPAddress = $_SERVER['REMOTE_ADDR'];

        if ($IPAddress == '127.0.0.1') {
            return true;
        }
        return (!filter_var($IPAddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE));
    }

    public static function URL()
    {
        if (self::isLocalIPAddress()) {
            return 'http://127.0.0.1:8000';
        } else {
            return 'http://163.47.156.109/survey_api/public';
        }
    }
}

?>
