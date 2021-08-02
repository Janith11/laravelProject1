<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\User;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class IntructorsController extends Controller
{
    public function index(){
        $instructors = Instructor::with('user')->get();
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.instructor.instructors', compact('instructors', 'logo'));
    }
    public function addinstructor(){
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.instructor.addinstructor', compact('logo'));
    }
    public function insertinstructor(Request $request){

        $this->validate($request,[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'nicnumber' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'contactnumber' => 'required',
            'addressnumber' => 'required',
            'addressstreatname' => 'required',
            'addresscity' => 'required',

            'birthday' => 'required|date',
        ]);

        $user = new User;
        $instructor = new Instructor;

        $user->f_name = $request->firstname;
        $user->role_id = 2;
        $user->m_name = $request->middlename;
        $user->l_name = $request->lastname;
        $user->nic_number = $request->nicnumber;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->contact_number = $request->contactnumber;
        $user->address_no = $request->addressnumber;
        $user->address_lineone = $request->addressstreatname;
        $user->address_linetwo = $request->addresscity;
        $user->dob = $request->birthday;
        $user->password = Hash::make('123456789');
        $user->profile_img= 'none';

        $user->save();

        $user->instructor()->save($instructor);
        return redirect()->route('insertinstructor')->with('successmsg', 'one Instructor wasadded successfuly !');
    }

    public function editinstructor($user_id){
        $Instructor = Instructor::where('user_id', '=',$user_id)->with('user')->get();
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.instructor.editinstructor',compact('Instructor', 'logo'));
    }

    public function updateinstructor(Request $request, $user_id){
        $this->validate($request,[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'nicnumber' => 'required',
            'gender' => 'required',
            'contactnumber' => 'required',
            'addressnumber' => 'required',
            'addressstreatname' => 'required',
            'addresscity' => 'required',
            'birthday' => 'required|date',
        ]);

            $user = User::find($user_id);


            $user->f_name = $request->firstname;
            $user->role_id = 2;
            $user->m_name = $request->middlename;
            $user->l_name = $request->lastname;
            $user->nic_number = $request->nicnumber;
            $user->gender = $request->gender;
            $user->contact_number = $request->contactnumber;
            $user->address_no = $request->addressnumber;
            $user->address_lineone = $request->addressstreatname;
            $user->address_linetwo = $request->addresscity;
            $user->dob = $request->birthday;

            $user->save();

            return redirect()->route('instructors')->with('successmsg', 'Instructor is updated successfuly !');
    }

}
