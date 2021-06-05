<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index(){
        $students = Student::with('user')->get();
        return view('owner\studentslist', compact('students'));
    }

    //return add student page (form)
    public function addstudent(){
        return view('owner\addstudent');
    }
    // >> button result page
    public function viewstudent($user_id){
        $student = Student::where('user_id','=',$user_id)->with('user')->get();
        return view('owner\viewstudent',compact('student'));
        
    }
    //insert student in to databse
    public function insertstudent(Request $request){ 
       
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
            // 'vehicalcategory' => 'required',
            'birthday' => 'required|date',
        ]);

        $user = new User;

        $user->frist_name = $request->firstname;
        $user->middle_name = $request->middlename;
        $user->last_name = $request->lastname;
        $user->nic_number = $request->nicnumber;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->contact_number = $request->contactnumber;
        $user->address_number = $request->addressnumber;
        $user->address_lineone = $request->addressstreatname;
        $user->address_linetwo = $request->addresscity;   
        $user->dob = $request->birthday;

        $user->save();

        $student = new Student;

        $student->total_fee = $request->total;
        $student->amount = 0;
        $user->student()->save($student);
        return redirect()->route('ownershedulelist')->with('successmsg', 'one student added successfuly !');
    }
 

}
