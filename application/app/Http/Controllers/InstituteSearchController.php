<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstituteSearchController extends Controller
{
    public function index()
    {
        return view('instituteSearch.index');
    }
}
