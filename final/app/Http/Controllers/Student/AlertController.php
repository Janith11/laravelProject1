<?php

namespace App\Http\Controllers\Student;

use App\AlertForStudent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{
    public function index(){

        $user_id = Auth::user()->id;

        $alerts = AlertForStudent::with('shedulealert')->where('student_id', $user_id)->where('alert_status', 0)->get();

        return view('student.alert.alert', compact('alerts'));
        
    }
}
