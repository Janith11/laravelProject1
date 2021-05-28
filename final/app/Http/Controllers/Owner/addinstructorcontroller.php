<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;

class addinstructorcontroller extends Controller
{
    public function index(){
        return view('owner.addinstructor');
    }

    public function insertinstructor(Request $request){
        
        $this->validate($request, [
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

        $instructor = new Instructor;

        $instructor->frist_name = $request->fristname;
        $instructor->last_name = $request->lastname;
        $instructor->middle_name = $request->middlename;
        $instructor->nic_number = $request->nicnumber;
        $instructor->email = $request->email;
        $instructor->gender = $request->gender;
        $instructor->contact_number = $request->contactnumber;
        $instructor->address_number = $request->addressnumber;
        $instructor->address_lineone = $request->addressstreatname;
        $instructor->address_linetwo = $request->addresscity;
        $instructor->vehicle_category = $request->vehiclecategory;
        $instructor->languages = $request->language;
        $instructor->dob = $request->birthday;

        $instructor->save();

        return redirect()->route('instructors')->with('successmsg', 'instructor added successfuly !');

    }
}
