<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoadsignsController extends Controller
{
    public function index(){
        return view('landingpage.roadsigns');
    }
}
