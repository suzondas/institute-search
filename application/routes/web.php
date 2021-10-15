<?php

use Illuminate\Support\Facades\Route;

/*
Updated by Suzon Das @12/10/2021
Purpose: Institute Search without login
*/

/*********************************Auth free************************/
Route::get('/', [\App\Http\Controllers\InstituteSearchController::class, 'web'])->name('web');
Route::get('local', [\App\Http\Controllers\InstituteSearchController::class, 'local'])->name('local');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

/*Routing for Helpers*/
Route::get('admin/getGeo', [\App\Helpers\GetGeo::class, 'GetGeoAll']);
/*Routing for Helpers Ends*/

/*Dynamic Routing for Institutes' pages*/
Route::get('/{Controller}/{action}',
    function ($Controller, $action) {
        return view("{$Controller}.{$action}");
    });
/*Dynamic Routing for Institutes' pages End*/

/*********************************Auth free Ends************************/


