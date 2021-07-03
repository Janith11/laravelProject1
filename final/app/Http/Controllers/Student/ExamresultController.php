<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ExamresultController extends Controller
{
    public function index(){
        $user_id=Auth::user();
        $result = Student::where('user_id','=',$user_id)->with('user')->get();
        return view ('Student.exam.examresult',compact('result'));
    }
    
}
