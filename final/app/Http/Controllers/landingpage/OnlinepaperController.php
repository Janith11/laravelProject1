<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnlinepaperController extends Controller
{
    public function index(){
        return view('landingpage.onlinepaper');
    }
}
