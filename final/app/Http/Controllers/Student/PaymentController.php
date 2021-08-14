<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\PaymentLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $payment = PaymentLog::with('user')->with('student')->where('user_id',Auth::user()->id)->get();
        $lastpayment=PaymentLog::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        $studentdetails=Student::where('user_id',Auth::user()->id)->get();
        return view('student.payment.viewpayments',compact('payment','studentdetails','lastpayment'));
    }
}
