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
        $students = Student::with('exams')->get();
        return view('owner.exam.examlist', compact('students'));
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

}
