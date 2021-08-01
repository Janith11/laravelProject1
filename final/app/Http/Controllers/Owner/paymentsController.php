<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use App\PaymentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentsController extends Controller
{
    public function index(){
       $studentslist = PaymentLog::with('user')->with('student')->orderBy('updated_at', 'desc')->get();
        // return $studentslist;
        return view('owner.payment.viewpayments',compact('studentslist'));
    }
    public function studentpayments($userid){
        $studentdetails=Student::where('user_id',$userid)->with('user')->get();
        return view('owner.payment.viewpaymentpage',compact('studentdetails'));
    }
    public function insertpayment(Request $request){
        $this->validate($request,[
            'sid' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);
        $userid=$request->sid;
        PaymentLog::create([
            'user_id' => $userid,
            'type'=> 'debit',
            'description'=>$request->description,
            'amount'=> $request->amount,
        ]);
        $student =new Student;
        $student->where('user_id',$userid)->increment('paid_amount',$request->amount);

        return redirect()->route('payments')->with('successmsg', 'Payment is added successfully !');
    }
}
