<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Exception;
use Twilio\Rest\Client;

class TwoFactorAuthenteController extends Controller
{
    public function index($id){
        return view('auth.TwoFactorAuth',compact('id'));
    }

    public function verify(Request $request){
        $this->validate($request,[
            'otp' => 'required',
            'uid' => 'required',
        ]);

        $userid=$request->uid;
        $user=User::find($userid);
        $otp=$user->otp;
        $code=$request->otp;
        if($otp == $code){
            $user->contact_no_isVerified = '1';
            $user->save();
            return redirect()->route('login')->with('verifiedmessage', 'Your phone number is verified, Please Login to your account');;
        }
        else{
            return redirect()->back()->with('errormsg', 'Your OTP is wrong!, please try again'); 
        }
        
    }
    public function resendverify($id){
        //generate a new OTP
        $OTP= rand(100000,999999);

        //find user and save new OTP
        $user=User::find($id);
        $user->otp = $OTP;
        $user->save();
        
        //convert international number
        $Co_number =$user->contact_number;
        $str = ltrim($Co_number, $Co_number[0]);
  	    $International_No = "+94".$str;
        
        //get ids from .env
        // $sid    = getenv("TWILIO_SID");
        // $token  = env("TWILIO_AUTH_TOKEN");
        // $from   = env("TWILIO_NUMBER");  

            $sid    = "AC931de8a21058807cca614b7063920450";
            $token  = "3c5fa7c927dd748823de52a0849aee7e";
            $from   = "+13023131782";

        //sending sms
        try {
            $twilio = new Client($sid, $token);
            $message = $twilio->messages
                  ->create($International_No, //to
                           array(
                               "body" => "Hello ".$user->f_name." ".$user->l_name."\nResending OTP. Welcome to the Driving School Management System. Your OTP is ".$OTP."\nThank you.",
                               "from" => $from
                           ));    
        }catch (Exception $e) {
        dd("Error: ". $e->getMessage());
        }
        return redirect()->route('TwoFactorAuth',$id)->with('successmsg', 'New OTP send to your mobile.');

    }
    public function againresendverify(){
        try{
            $uid=Auth::user()->id;
            $phone=Auth::user()->contact_number;
            $maskedPhone = substr($phone, 0, 4) . "****" . substr($phone, 7, 4);
            return view('auth.ProceedTFAagin',compact('uid','maskedPhone'));
        }catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
   
}
