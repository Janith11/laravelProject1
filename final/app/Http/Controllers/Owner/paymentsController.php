<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentsController extends Controller
{
    public function index(){
        return view('owner.payment');
    }
}
