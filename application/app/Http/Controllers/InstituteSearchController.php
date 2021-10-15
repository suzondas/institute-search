<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\GetDeployConfig;
class InstituteSearchController extends Controller
{
    public function web()
    {
        Session::put('apiServer', GetDeployConfig::DeployConfigData('production')->apiServer);
        Session::put('baseUrl', GetDeployConfig::DeployConfigData('production')->baseUrl);
        return view('instituteSearch.index');
    }

    public function local()
    {
        Session::put('apiServer', GetDeployConfig::DeployConfigData('local')->apiServer);
        Session::put('baseUrl', GetDeployConfig::DeployConfigData('local')->baseUrl);
        return view('instituteSearch.index');
    }
}
