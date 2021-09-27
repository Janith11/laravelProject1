<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class MyResetPasswordController extends Controller
{
    public function index(){
        return view('auth.ResetPassword.ResetPhoneNumberInput');
    }
    public function checknumber(Request $request){
        $usernumber=$request->phonenumber;
        $user_details=User::where('contact_number',$usernumber)->first();
        if($user_details == null){
            return redirect()->back()->with('errormsg', 'Invalid phone number, Please Enter verifired phone number');   
        }else{
            //generate a new OTP
            $OTP= rand(100000,999999);

            //find user and save new OTP
            $user_details->otp = $OTP;
            $user_details->save();

            //convert international number
            $Co_number =$user_details->contact_number;
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
                //     ->create($International_No, //to
                //             array(
                //                 "body" => "Hello ".$user_details->f_name." ".$user_details->l_name."\nDriving School Management System sending your OTP. Your OTP is ".$OTP."\nReset Your Password. Thank you.",
                //                 "from" => $from
                //             ));    
            }catch (Exception $e) {
                dd("Error: ". $e->getMessage());
            }
            $errormsg =false;
            return view('auth.ResetPassword.OtpEnterView',compact('user_details','errormsg'));
        }
    }

    public function checkotp(Request $request){
        $phone_number=$request->phonenumber;
        $user_details=User::where('contact_number',$phone_number)->first();
        $OTP=$request->otp;
        if($user_details->otp == $OTP){
           return view('auth.ResetPassword.PasswordChange',compact('user_details'));
        }else{
            $errormsg="OTP is invalid, Please enter again!";
            return view('auth.ResetPassword.OtpEnterView',compact('user_details','errormsg'));
            // return redirect()->back()->with('user_details',$user_details)->with('errormsg','OTP is invalid, Please enter again!');
            // return Redirect::back()->with('errormsg','OTP is invalid, Please enter again!',compact('user_details'));
            // return view('auth.ResetPassword.OtpEnterView',compact('user_details'),['errormsg'=>'OTP is invalid, Please enter again!']);
           
        }
    }

    public function changepassword(Request $request){
        $this->validate($request,[
            'phonenumber' => 'required',
            'password' => 'required',
        ]);
        $contact_number=$request->phonenumber;
        $password=$request->password;
        
        $user_details=User::where('contact_number',$contact_number)->first();
        $user_details->password = Hash::make($request['password']);
        $user_details->save();
        // 
        return redirect()->route('login')->with('verifiedmessage', 'Pasword change successfully!');
    }
}
