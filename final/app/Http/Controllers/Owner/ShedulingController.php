<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShedulingController extends Controller
{
    public function index(){
        return view('owner.sheduling');
    }
}
