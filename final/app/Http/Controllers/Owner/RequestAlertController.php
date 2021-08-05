<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestAlertController extends Controller
{
    public function index(){
        return view('owner.Alert.viewalert');
    }
}
