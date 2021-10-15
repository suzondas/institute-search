<?php
namespace App\Helpers;

class GetDeployConfig
{

    public static function DeployConfigData($mode)
    {
        $configs = [

            /*Developer Machine*/
            "developer" => [
                "apiServer" => "http://localhost:8000",
                "baseUrl"=>"/"
            ],
            /*Developer Machine*/

            /*33 Server*/
            "production" => [
                "apiServer" => "http://202.72.235.210/institute-search/api/public",
                "baseUrl"=>"/"
            ],
            "local" => [
                "apiServer" => "http://192.168.245.33/institute-search/api/public",
                "baseUrl"=>"/local"
            ]
            /*33 Server*/

        ];
        $deployConfigData = new \stdClass();
        $deployConfigData->apiServer = "";
        if (isset($configs[$mode])) {
            $deployConfigData->apiServer = $configs[$mode]["apiServer"];
            $deployConfigData->baseUrl = $configs[$mode]["baseUrl"];
        }
        return $deployConfigData;
    }
}

?>
