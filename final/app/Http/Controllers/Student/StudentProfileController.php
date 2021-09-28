<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Twilio\Rest\Client;

class StudentProfileController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $student = Student::with('user')->where('user_id', $id)->get();
        return view('student.profile.profile', compact('student'));
    }

    public function updateprofile(Request $request){

        $this->validate($request, [
            'first_name' => 'required|min:5|alpha',
            'middle_name' => 'required|min:5|alpha',
            'last_name' => 'required|min:5|alpha',
            'nic_number' => 'required|digits:9|alpha_num',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'mobile_number' => 'required|digits:10|alpha_num',
            'address_no' => 'required',
            'address_line_one' => 'required',
            'address_line_two' => 'required',
        ]);

        $student_id = Auth::user()->id;
        $student = User::find($student_id);
        $student->f_name = $request->first_name;
        $student->m_name = $request->middle_name;
        $student->l_name = $request->last_name;
        $student->email = $request->email;
        $student->nic_number = $request->nic_number;
        $student->gender = $request->gender;
        $student->contact_number = $request->mobile_number;
        $student->dob = $request->date_of_birth;
        $student->address_no = $request->address_no;
        $student->address_lineone = $request->address_line_one;
        $student->address_linetwo = $request->address_line_two;
        $student->save();

        return redirect()->route('studentprofile')->with('successmsg', 'Profile Update Successfully !!');
    }

    public function updateprofilepicture(Request $request){
        $folderPath = public_path('uploadimages/students_profiles/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        file_put_contents($imageFullPath, $image_base64);

        $instructor_id = Auth::user()->id;
        $profileimage = User::find($instructor_id);
        $profileimage->profile_img = $imageName;
        $profileimage->save();

        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }

    public function changepassword(){
        // return 'hi';
        return view('student.profile.changepassword');
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

        return view('student.profile.EnterOTP');

        // $student = User::find($student_id);
        // $student->password = Hash::make($request->new_password);
        // $student->save();

        // return redirect()->route('studentprofile')->with('successmsg', 'Password Change Successfully !!');

    }

    public function enterotp(Request $request){
        $this->validate($request, [
            'otp' => ['required'],
        ]);
        
        $user = Auth::user();

        if($user->otp == $request->otp){
            return redirect()->route('studentupdatepasswordChangeView');
        }else{
            return view('student.profile.EnterOTP')->with('errormsg', 'OTP is incorrect!');
        }   
    }

    public function chanegPasswordView(){
        return view('student.profile.changeNewPassword');
    }

    public function updatepassword(Request $request){
       
        $this->validate($request, [
            'new_password' => 'required|min:8',
            'confirm_password' => ['same:new_password'],
        ]);
        $student = Auth::user();
        $student->password = Hash::make($request->new_password);
        $student->save();

        Auth::logout();
        return redirect()->route('login')->with('verifiedmessage', 'Pasword change successfully!');
    }
}
