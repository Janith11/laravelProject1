<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentsController extends Controller
{
    public function index(){
        $studentslist = Student::with('user')->get();
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.payment.viewpayments',compact('studentslist', 'logo'));
    }
    public function studentpayments($userid){
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.payment.viewpaymentpage', compact('logo'));
    }
}
