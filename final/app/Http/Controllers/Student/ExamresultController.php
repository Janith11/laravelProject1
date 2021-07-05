<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Exam;
use Auth;

class ExamresultController extends Controller
{
    public function index(){
        $user_id=Auth::user()->id;
        $users = Student::where('user_id','=',$user_id)->with('user')->get();
        $examdetails = Student::where('user_id','=',$user_id)->with('exams')->get();
        return view ('Student.exam.examresult',compact('users','examdetails'));
        // return($users);
    }
    
}
