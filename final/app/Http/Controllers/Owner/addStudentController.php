<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class addStudentController extends Controller
{
    public function index(){
        return view('owner.addstudent');
    }

    public function insertstudent(Request $request){

        $this->validate($request,[
            'fristname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'nicnumber' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'contactnumber' => 'required',
            'addressnumber' => 'required',
            'addressstreatname' => 'required',
            'addresscity' => 'required',
            'vehiclecategory' => 'required',
            'language' => 'required',
            'birthday' => 'required|date',
        ]);

        $student = new User;

        $student->frist_name = $request->fristname;
        $student->last_name = $request->lastname;
        $student->middle_name = $request->middlename;
        $student->nic_number = $request->nicnumber;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->contact_number = $request->contactnumber;
        $student->address_number = $request->addressnumber;
        $student->address_lineone = $request->addressstreatname;
        $student->address_linetwo = $request->addresscity;
        $student->vehicle_category = $request->vehiclecategory;
        $student->languages = $request->language;
        $student->dob = $request->birthday;

        $student->save();

        return redirect()->route('students')->with('successmsg', 'Student added successfuly !');

    }
}
