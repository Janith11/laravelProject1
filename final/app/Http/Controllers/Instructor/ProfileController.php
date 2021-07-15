<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;
use Psy\Util\Json as UtilJson;

class ProfileController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $instructor = Instructor::with('user')->where('user_id', $id)->get();
        return view('instructor.profile.profile', compact('instructor'));
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
            'address_line_one' => 'required|alpha',
            'address_line_two' => 'required|alpha',
        ]);

        $instructor_id = Auth::user()->id;
        $instructor = User::find($instructor_id);
        $instructor->f_name = $request->first_name;
        $instructor->m_name = $request->middle_name;
        $instructor->l_name = $request->last_name;
        $instructor->email = $request->email;
        $instructor->nic_number = $request->nic_number;
        $instructor->gender = $request->gender;
        $instructor->contact_number = $request->mobile_number;
        $instructor->dob = $request->date_of_birth;
        $instructor->address_no = $request->address_no;
        $instructor->address_lineone = $request->address_line_one;
        $instructor->address_linetwo = $request->address_line_two;
        $instructor->save();

        return redirect()->route('instructorprofile')->with('successmsg', 'Profile Update Successfully !!');
    }

    public function updateprofilepicture(Request $request){
        $folderPath = public_path('uploadimages/instructors_profiles/');

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

}
