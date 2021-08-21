<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OnlinepaperController extends Controller
{
    public function index(){
        return view('landingpage.onlinepaper');
    }
    public function paper1(){
        return view('landingpage.onlinepapers.paperone');
    }
    public function paper2(){
        return view('landingpage.onlinepapers.papertwo');
    }
    public function paper3(){
        return view('landingpage.onlinepapers.paperthree');
    }
    public function paper4(){
        return view('landingpage.onlinepapers.paperfour');
    }
    public function paper5(){
        return view('landingpage.onlinepapers.paperfive');
    }
    public function paper6(){
        return view('landingpage.onlinepapers.papersix');
    }
    public function paper7(){
        return view('landingpage.onlinepapers.paperseven');
    }
    public function paper8(){
        return view('landingpage.onlinepapers.papereight');
    }
    public function paper9(){
        return view('landingpage.onlinepapers.papernine');
    }
    public function paper10(){
        return view('landingpage.onlinepapers.paperten');
    }
}
