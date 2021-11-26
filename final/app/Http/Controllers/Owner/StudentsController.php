<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\Student;
use App\TrainingVehicleCategory;
use App\User;
use App\Exam;
use App\VehicleCategory;
use App\StudentCategory;
use App\Message;
use App\Shedule;
use App\SheduledStudents;
use App\SheduleRequest;
use App\StudentProgress;
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
            $query->where('status', 3);
        })->count();

        return view('owner.students.studentslist', compact('students', 'requst_students', 'complete_students'));
    }

    //return add student page (form)
    public function addstudent(){
        $vehicalcategory=VehicleCategory::all();
        return view('owner.students.addstudent', compact('vehicalcategory'));
    }

    // >> button result page
    public function viewstudent($user_id){
        $student = Student::where('user_id','=',$user_id)->with('user')->get();
        $examdetails = Student::where('user_id','=',$user_id)->with('exams')->get();
        $student_categories= StudentCategory::where('user_id','=',$user_id)->get();

        $training_categories = StudentCategory::where('user_id', $user_id)->select('category')->get();
        $categories = [];
        foreach ($training_categories as $cat) {
            $categories[] = $cat->category;
        }

        // values for category summery
        $vcategories = VehicleCategory::all();
        $dataset = [];
        foreach ($categories as $cat) {
            $child = [];
            foreach ($vcategories as $vcat) {
                if($vcat->category_code == $cat){
                    $child['label'] = ucwords($vcat->name);
                }
            }
            $datachild = [];
            for ($i = 1; $i <= 4 ; $i++) {
                $result = StudentProgress::where('user_id', $user_id)->where('category_code' , $cat)->where('grade', $i)->count();
                $datachild[] = $result;
            }
            $child['data'] = $datachild;
            $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF57)), 6, '0', STR_PAD_LEFT);
            $child['borderColor'] = $color;
            $child['backgroundColor'] = $color;
            $child['borderWidth'] = 1;
            array_push($dataset, $child);
        }

        // values for dounut chart
        $yValues = [];
        for ($i = 1; $i <= 4; $i++) {
            $result = StudentProgress::where('grade', $i)->count();
            $yValues[] = $result;
        }

        // training counts;
        $trainingcat = StudentCategory::where('user_id', $user_id)->select(['category', 'transmission'])->get();
        $trainingcounts = [];
        foreach($trainingcat as $cat){
            $child = [];
            $res = Shedule::where('vahicle_category', $cat->category)->where('transmission', $cat->transmission)->where('shedule_status', 2)->whereHas('sheduledstudents', function($query) use($user_id){
                $query->where('student_id', $user_id);
            })->count();
            $child['category'] = $cat->category;
            $child['count'] = $res;
            array_push($trainingcounts, $child);
        }

        // session counts
        $completed_session = Student::select('completed_session')->where('user_id', $user_id)->first();
        $total_session =  Student::where('user_id', $user_id)->select('total_session')->first();

        return view('owner.students.viewstudent',compact('student','examdetails','student_categories','yValues', 'dataset', 'trainingcounts', 'completed_session', 'total_session', 'vcategories'));

    }

    //insert student in to databse
    public function insertstudent(Request $request){

        $this->validate($request,[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'nicnumber' => ['required', 'string', 'max:12','unique:users,contact_number'],
            // 'email' => 'required',
            'gender' => 'required',
            'contactnumber' => ['required','max:15','unique:users,contact_number'],
            'addressnumber' => 'required',
            'addressstreatname' => 'required',
            'addresscity' => 'required',
            'birthday' => ['required', 'string','date','max:255'],
            'vehicle_category'=>'required',
            'totalsession'=>'required'
            ]);
        $user = User::create([
            'f_name' => $request->firstname,
            'm_name' => $request->middlename,
            'l_name' => $request->lastname,
            'nic_number' => $request->nicnumber,
            // 'email' => $request->email,
            'gender' => $request->gender,
            'contact_number' => $request->contactnumber,
            'contact_no_isVerified' =>1,
            'otp'=>"000000",
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
        if($user->gender == 'male'){
            Message::create([
                'from'=>1,
                'to'=> $user->id,
                'has_read'=>0,
                'text'=>'Congratulations Sir on joining our driving school! We look forward to sharing to many successes!'
            ]);
        }else{
            Message::create([
                'from'=>1,
                'to'=> $user->id,
                'has_read'=>0,
                'text'=>'Congratulations Madam on joining our driving school! We look forward to sharing to many successes!'
            ]);
        }
            Message::create([
                'from'=>1,
                'to'=> $user->id,
                'has_read'=>0,
                'text'=>'Welcome to the Driving School chat system. We are hoping to share your difficulties and other requirement with here. Our administration willing to help you. Do not be shy drop a message here.'
            ]);
            Message::create([
                'from'=>1,
                'to'=> $user->id,
                'has_read'=>0,
                'text'=>'You can schedule the time table with your free time. Good luck in your future career. Thank You!'
            ]);


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
    public function completedstudent(){
        $students=Student::with('user')->get();
        $exams=Student::with(['practicalexam' =>function($query){
            $query->orderBy('date','DESC');
        }])->get();
        $categories=StudentCategory::all();
        return view('owner.students.viewcompletedstudent',compact('students','exams','categories'));
    }
    public function temporydelete(Request $request,$id){
        $user=User::where('id',$id)->first();
        $user->role_id = 4;
        $user->status = 3;
        $user->save();
        return redirect()->route('completedstudents')->with('successmsg', 'Student is deleted successfully!, Student account has been disabled!');
    }

    public function viewrecycle(){
        $users=User::where('role_id',4)->where('status',3)->get();
        return view('owner.students.viewdeletedstudents',compact('users'));
    }

    public function restorestudent(Request $request,$userid){
        $user=User::where('id',$userid)->first();
        $user->role_id = 3;
        $user->status = 1;
        $user->save();
        return redirect()->route('viewstudentrecyclebin')->with('successmsg', 'Student is restored successfully!');
    }

    public function studentsevent($user_id){
        return view('owner.students.studentcalenderview', compact('user_id'));
    }

    public function studenteventlist($user_id){
        $responses = [];
        $resultone = SheduledStudents::with('shedule')->where('student_id', $user_id)->get();
        $resulttwo = SheduleRequest::with('Shedules')->where('user_id', $user_id)->whereIn('shedule_status', [0, 2])->get();
        foreach($resultone as $one){
            $row = [];
            if ($one->shedule->shedule_status == 1) {
                $row['title'] = $one->shedule->title;
                $row['color'] = '#35FF35';
                $row['textColor'] = '#040124';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }elseif ($one->shedule->shedule_status == 2) {
                $row['title'] = $one->shedule->title;
                $row['color'] = '#03011F';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }elseif ($one->shedule->shedule_status == 3) {
                $row['title'] = $one->shedule->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }else{
                $row['title'] = $one->shedule->title;
                $row['color'] = '#FF891A';
                $row['textColor'] = '#040124';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }
        }
        foreach ($resulttwo as $two) {
            $row = [];
            if ($two->shedule_status == 0) {
                $row['title'] = $two->Shedules->title;
                $row['color'] = '#0FD8F3';
                $row['textColor'] = '#040124';
                $row['date'] = $two->Shedules->date;
                array_push($responses, $row);
            }elseif ($two->shedule_status == 2) {
                $row['title'] = $two->Shedules->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $two->Shedules->date;
                array_push($responses, $row);
            }
        }
        // return $user_id;
        return response()->json($responses);
    }

    public function deleteStudent(Request $request){
        $user_id=$request->uid;
        $user=User::find($user_id);
        $user->role_id = 4;
        $user->status = 3;
        $user->save();
        return redirect()->route('studentslist')->with('successmsg', 'Student is Deleted successfully!');
    }

    public function getallstudents(){
        $results = User::with('student')->where('role_id', [3,4])->get();
        return $results;
    }

    public function active(){
        $results = Student::with('user')->get();
        return $results;
    }

    public function requestedstudents(){
        $results = User::where('status', 0)->where('role_id', 4)->get();
        return $results;
    }

    public function fineshedcourse(){
        $results = User::with('student')->where('status', 2)->where('role_id', 4)->get();
        return $results;
    }
}



