<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Student;
use App\TrainingVehicleCategory;
use App\User;
use App\Exam;
use App\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index(){
        $students = Student::with('user')->whereHas('user' , function($query){
            $query->where('status', 1);
        })->get();
        $requst_students = Student::with('user')->whereHas('user', function($query){
            $query->where('status', 0);
        })->count();
        $complete_students = Student::with('user')->whereHas('user', function($query){
            $query->where('status', 2);
        })->count();
        return view('owner.students.studentslist', compact('students', 'requst_students', 'complete_students'));
    }

    //return add student page (form)
    public function addstudent(){
        $vehicle_category = VehicleCategory::all();
        return view('owner.students.addstudent', compact('vehicle_category'));
    }

    // >> button result page
    public function viewstudent($user_id){
        $student = Student::where('user_id','=',$user_id)->with('user')->get();
        $examdetails = Student::where('user_id','=',$user_id)->with('exams')->get();
        return view('owner.students.viewstudent',compact('student','examdetails'));

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

        $categories = $request->category;
        if (empty($categories)) {
            return back()->with('categoryerror', 'You nedd to select training categories !!');
        }

        $user = User::create([
            'f_name' => $request->firstname,
            'm_name' => $request->middlename,
            'l_name' => $request->lastname,
            'nic_number' => $request->nicnumber,
            'email' => $request->email,
            'gender' => $request->gender,
            'contact_number' => $request->contactnumber,
            'address_no' => $request->addressnumber,
            'address_lineone' => $request->addressstreatname,
            'address_linetwo' => $request->addresscity,
            'dob' => $request->birthday,
            'password' => bcrypt('123456789'),
            'profile_img' => 'default_profile.jpg',
            'status' => 1
        ]);

        $student = Student::create([
            'user_id' => $user->id,
            'total_fee' => 0,
            'amount' => 0,
        ]);

        foreach ($categories as $category) {
            $training_type = TrainingVehicleCategory::create([
                'category_id' => $category,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('addstudent')->with('successmsg', 'one student added successfuly !');

    }

    public function editstudent($user_id){
        $student = Student::where('user_id', '=',$user_id)->with('user')->get();
        return view('owner.students.editstudent',compact('student'));
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



