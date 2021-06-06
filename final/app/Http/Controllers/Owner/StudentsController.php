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

    public function testinsertstudent(){ 

        $user = new User;

        $user->f_name = 'test f_name';
        $user->m_name = 'test m_name';
        $user->l_name = 'test l_name';
        $user->nic_number = '456789133254';
        $user->email = 'test5@gmail.com';
        $user->gender = 'male';
        $user->contact_number = '1234567890';
        $user->address_no = 'Adfsedfsde';
        $user->address_lineone = 'test lineone';
        $user->address_linetwo = 'test linetwo';
        $user->password = bcrypt('123456789');  
        $user->status = 1;  
        $user->profile_img = '123456';
        $user->dob = '2021-03-03';

        $user->save();

        $student = new Student;

        $student->total_fee = '4000';
        $student->amount = 0;
        $student->save();
        $user->student()->save($student);
        return redirect()->route('ownershedulelist')->with('successmsg', 'one student added successfuly !');
    }
 

}
