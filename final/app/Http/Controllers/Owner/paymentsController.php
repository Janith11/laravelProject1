<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentsController extends Controller
{
    public function index(){
        $studentslist = Student::with('user')->get();
        return view('owner.payment.viewpayments',compact('studentslist'));
    }
    public function studentpayments($userid){
        return view('owner.payment.viewpaymentpage');
    }
}
