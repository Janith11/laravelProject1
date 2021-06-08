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
            
            'birthday' => 'required|date',
        ]);

        $user = new User;

        $user->f_name = $request->firstname;
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
        $user->password =bcrypt('123456789');
        $user->profile_img= 'none';

        
        $user->save();

        $student = new Student;
        

        $student->total_fee = 0;
        $student->amount = 0;
        $user->student()->save($student);
        return redirect()->route('addstudent')->with('successmsg', 'one student added successfuly !');
    }

    public function editstudent($user_id){
        $student = Student::where('user_id', '=',$user_id)->with('user')->get();
        return view('owner.editstudent',compact('student'));
    }
    public function updatestudent(Request $request, $user_id){
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
        
            return redirect()->route('studentslist')->with('successmsg', 'Student was updated successfuly !');
        
    }

}
 


