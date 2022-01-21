<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Exam;
use Auth;
use App\Exam_Dates;

class ExamresultController extends Controller
{
    public function index(){
        $user_id=Auth::user()->id;
        $users = Student::where('user_id','=',$user_id)->with('user')->get();
        $examdetails = Student::where('user_id','=',$user_id)->with('exams')->get();
        return view ('Student.exam.examresult',compact('users','examdetails'));
        // return($users);
    }
    //upcoming exam dates display
    public function requestexamdates(){
        $user_id=Auth::user()->id;
        return view('student.exam.upcomingexamdate');
        
    }

    public function viewexamdates(){
        $alldates=Exam_Dates::all();
        $responses=[];
        foreach($alldates as $onedate){
            $row=[];
            $color='#3366CC';// color for theory
            if($onedate->exam_type == 'Practical'){
                $color='#56B948';//color for practrical
            }
            $row['title'] = $onedate->exam_type;
            $row['color'] = $color;
            $row['textColor'] = '#FFFFFF';
            $row['date'] = $onedate->exam_date;
            $row['id'] =$onedate->id;
            array_push($responses, $row);
        }
    return response()->json($responses);

    }
    public function selecteventdate($id){
        return $id;
    }

    
}
