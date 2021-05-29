<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesCotroller extends Controller
{
    public function index(){
        return view ('landingpage/services');
    }
}
