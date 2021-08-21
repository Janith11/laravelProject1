<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoadsignsController extends Controller
{
    public function index(){
        return view('landingpage.roadsigns');
    }
    public function dangerwarningsign(){
        return view('landingpage.roadsigns.dangerwarningsign');
    }
    public function prohibitorysigns(){
        return view('landingpage.roadsigns.prohibitorysigns');
    }
    public function prioritysigns(){
        return view('landingpage.roadsigns.prioritysigns');
    }
    public function mandatorysigns(){
        return view('landingpage.roadsigns.mandatorysigns');
    }
    public function informativesigns(){
        return view('landingpage.roadsigns.informativesigns');
    }
    public function routenumbersign(){
        return view('landingpage.roadsigns.routenumbersign');
    }
    public function trafficlightsignals(){
        return view('landingpage.roadsigns.trafficlightsignals');
    }
}
