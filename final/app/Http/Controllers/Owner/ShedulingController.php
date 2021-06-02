<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ShedulingController extends Controller
{
    public function index(){
        return view('owner.sheduling');
    }

    public function addshedule(){
        return view('owner.addshedule');
    }

    public function checkinput($date, $time){

        $instructors = User::where('role_id','=',2)->get();
        $students = User::where('role_id', '=', 3)->get();
        return view('owner.createshedule', compact('date', 'time', 'instructors', 'students'));
    }
}
