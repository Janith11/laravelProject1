<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewrequestController extends Controller
{
    public function index(){
        return view('Owner\checkrequist');
    }
}
