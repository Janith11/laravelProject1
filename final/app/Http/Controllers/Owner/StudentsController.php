<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Student;
use App\TrainingVehicleCategory;
use App\User;
use App\Exam;
use App\VehicleCategory;
use App\StudentCategory;
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
        // $vehicle_category = VehicleCategory::all();
        $vehicalcategory=VehicleCategory::all();
        return view('owner.students.addstudent', compact('vehicalcategory'));
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
            'vehicle_category'=>'required',
            'totalsession'=>'required'
            ]);
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
            'password' => bcrypt('Learner@2021'),
            'profile_img' => 'default_profile.jpg',
            'status' => 1,
            'role_id'=>3
        ]);

        $student = Student::create([
            'user_id' => $user->id,
            'paid_amount' => 0,
            'total_fee' => $request->price,
            'completed_session'=>0,
            'total_session'=>$request->totalsession,
            'group_number'=>$request->groupnumber,
        ]);
        $exams=Exam::create([
            'user_id'=>$user->id,
            'type'=> 'theory',
            'result'=>'none',
            'attempt'=>1
        ]);
        $exams=Exam::create([
            'user_id'=>$user->id,
            'type'=> 'practical',
            'result'=>'none',
            'attempt'=>1
        ]);

        $selected_category = $request['vehicle_category'];
        $test=[];
        foreach ($selected_category as  $category) {
            $row =[];
            if(($category == 'B1') || ($category == 'C')) {
                $row[$category] = [ $request[$category], "3" ];
            }
            else{
                $row[$category] = [ $request[$category], $request["trans".$category]  ];
            }
            array_push($test,$row);
        }
        foreach($test as $value){
            foreach($value as $key=>$val1){
           
            $transmission = '';
            $trainig='';
            $count=0;
            foreach($val1 as $val2){
                if($count == 0){
                    $trainig =$val2;
                }else{
                    $transmission=$val2;
                }
                $count+=1;
            }
            $count = 0;
            StudentCategory::create([
                'user_id'=>$user->id,
                'category'=>$key,
                'tstatus'=>$trainig,
                'transmission'=>$transmission
            ]);
        }
            
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
        $user->role_id = 3;
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
    public function viewcategory($user_id){
        $category=StudentCategory::where('user_id',$user_id)->get();
        $havecategory=StudentCategory::where('user_id',$user_id)->select('category')->get();
        $notcategory=VehicleCategory::whereNotIn('category_code',$havecategory)->get();
        // return $notcategory;
        return view('owner.students.editcategory',compact('category','notcategory'));
    }

    public function updatecategory(Request $request,$id,$userid){
        
        $this->validate($request,[
            'category' => 'required',
            'tstatus' => 'required',
            'transmission' => 'required',
        ]);

        $studentcategory = StudentCategory::find($id);
        $studentcategory->category =$request->category;
        $studentcategory->tstatus =$request->tstatus;
        $studentcategory->transmission =$request->transmission;
        $studentcategory->save();

        return redirect()->route('categoryview',$userid)->with('successmsg', 'Student Category is updated successfully !');

    }

    public function deleteecategory($id,$userid){
        StudentCategory::find($id)->delete();
        return redirect()->route('categoryview',$userid)->with('successmsg', 'Student Category is deleted successfully !');
    }
    public function addnewcategory(Request $request){
        $this->validate($request,[
            'userid' => 'required',
            'category_code'=>'required',
            'tstatus' => 'required',
            'transmission' => 'required',
        ]);
        $student_category=StudentCategory::create([
            'user_id'=>$request->userid,
            'category'=>$request->category_code,
            'tstatus'=>$request->tstatus,
            'transmission'=>$request->transmission,
        ]);
        return redirect()->route('categoryview',$request->userid)->with('successmsg', 'Student new Category is updated
         successfully !');
    }

}



