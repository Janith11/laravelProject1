<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Twilio\Rest\Client;

class ChangePasswordController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(){
        return view('instructor.profile.changepassword');
    }

    public function store(Request $request){

        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
        ]);

        $user = Auth::user();
        
        //generate a new OTP
        $OTP= rand(100000,999999);

        //find user and save new OTP
        $user->otp = $OTP;
        $user->save();
        
        //convert international number
        $Co_number =$user->contact_number;
        $str = ltrim($Co_number, $Co_number[0]);
  	    $International_No = "+94".$str;
        
        //get ids from .env
        $sid    = getenv("TWILIO_SID");
        $token  = env("TWILIO_AUTH_TOKEN");
        $from   = env("TWILIO_NUMBER");  

        //sending sms
        try {
            $twilio = new Client($sid, $token);
            // $message = $twilio->messages
            //       ->create($International_No, //to
            //                array(
            //                    "body" => "Hello ".$user->f_name." ".$user->l_name."\nResending OTP. Welcome to the Driving School Management System. Your OTP is ".$OTP."\nThank you.",
            //                    "from" => $from
            //                ));    
        }catch (Exception $e) {
        dd("Error: ". $e->getMessage());
        }

        return redirect()->route('instructorpasswordSEndOTP');

    }

    public function SendOTP(){
        return view('instructor.profile.EnterOTP');
    }

    public function CheckOTP(Request $request){
        $this->validate($request, [
            'otp' => ['required'],
        ]);
        
        $user = Auth::user();

        if($user->otp == $request->otp){
            return redirect()->route('instructorpasswordChangeView');
        }else{
            return redirect()->back()->with('errormsg', 'OTP is incorrect!');
        }   
    }

    public function ChangePasswordView(){
        return view('instructor.profile.ChangeNewPassword');
    }

    public function PasswordChanged(Request $request){
        $this->validate($request, [
            'new_password' => 'required|min:8',
            'confirm_password' => ['same:new_password'],
        ]);
        $Owner = Auth::user();
        $Owner->password = Hash::make($request->new_password);
        $Owner->save();

        Auth::logout();
        return redirect()->route('login')->with('verifiedmessage', 'Pasword change successfully!');
    }

}
