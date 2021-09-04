<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Exam;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function index(){
        $students = Student::with('exams')->paginate(4);
        // return $students;
        $lastgroupnumber =Student::all()->last();
        $number= $lastgroupnumber->group_number;
        $studentcount =Student::where('group_number',$number)->count();
        // return $studentcount;
        return view('owner.exam.examlist', compact('students','lastgroupnumber','studentcount'));
    }

    public function edit($user_id){
        $student = Student::where('user_id','=',$user_id)->with('user')->get();
        $examdetails = Student::where('user_id','=',$user_id)->with('exams')->get();
        return view ('owner.exam.editexamlist', compact('student','examdetails'));
    }

    public function saveexamlist(Request $request, $id){
        $this->validate($request,[
            'type'=> 'required',
            'date'=> 'required|date',
            'result'=> 'required',
            'attempt'=> 'required',
        ]);
        $exams = Exam::find($id);

        $exams->type=$request->type;
        $exams->date=$request->date;
        $exams->result=$request->result;
        $exams->attempt=$request->attempt;

        $exams->save();
        return redirect()->route('ownerexamresult')->with('successmsg', 'Exam details is updated successfuly !');
    }

    public function addresults($user_id){
        $student = Student::where('user_id','=',$user_id)->with('user')->get();
        $examdetails = Student::where('user_id','=',$user_id)->with('exams')->get();
        return view ('owner.exam.addexamlist', compact('student','examdetails'));
    }

    public function saveresults(Request $request){

        $this->validate($request,[
            'userid'=>'required',
            'type'=> 'required',
            'date'=> 'required|date',
            'result'=> 'required',
            'attempt'=> 'required',
        ]);

        $exam = Exam::create([
        'user_id'=>$request->userid,
        'type'=>$request->type,
        'date'=>$request->date,
        'result'=>$request->result,
        'attempt'=>$request->attempt

    ]);
    return redirect()->route('ownerexamresult')->with('successmsg', 'Exam result is added successfully !');

    }
    public function setexamdate(Request $request){
        $this->validate($request,[
            'groupnumber'=>'required',
            'result'=> 'required',
            'date'=> 'required|date',
            'examtype'=> 'required',
        ]);
        $type=$request->examtype;
        $students = Student::with('exams')->where('group_number',$request->groupnumber)->get();
        
        if($students->isEmpty()){
            return redirect()->back()->with('grouperror', 'Check group again! This group number is unavailable.');
        }

        foreach($students as $student){
            $id='';
            foreach($student->exams as $exam){
                if($exam->type == $type){
                    $id=$exam->id;
                    $examupdate=Exam::find($id);
                    $examupdate->date = $request->date;
                    $examupdate->result=$request->result;
                    $examupdate->save();
                }
            }
        }
        return redirect()->route('ownerexamresult')->with('successmsg', 'Student Group Exam date updated Successfully!');
    }

}
