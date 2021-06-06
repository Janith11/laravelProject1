<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
use App\SheduledStudents;
use App\Student;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ShedulingController extends Controller
{
    public function index(){
        $shedules = OwnerShedule::where('shedule_status', '=', 1)->with('SheduledStudents')->get();
        return view('owner.sheduling.shedulelist', compact('shedules'));
    }

    public function addshedule(){
        return view('owner.sheduling.addshedule');
    }

    public function checkinput($date, $time){

        $instructors = Instructor::with('user')->get();
        $students = Student::with('user')->get();

        return view('owner.sheduling.createshedule', compact('date', 'time', 'instructors', 'students'));
    }

    public function saveshedule(Request $request){

        $this->validate($request, [
            'shedulename' => 'required',
        ]);

        $shedule = new OwnerShedule;
        $shedule_std = new SheduledStudents;

        $shedule->shedule_name = $request->shedulename;
        $shedule->date = $request->date;
        $shedule->time = $request->time;
        $shedule->lesson_type = $request->lessontype;

        $select_instructor = $request->instructor;
        $select_students = $request->students;

        if(empty($select_instructor)){
            return back()->with('instructorerror', 'You have to select an Instructor !!');
        }else{
            if(count($select_instructor) > 1){
                return back()->with('instructorerror', 'Cannot choose more than one Instructor !!');
            }else{
                if(empty($select_students)){
                    return back()->with('studenterror', 'You have to select an Students !!');
                }else{
                    $shedule->instructor = $select_instructor[0];
                    $shedule->save();
                    foreach($select_students as $select_student){
                        $shedule_std->student_id = $select_student;
                        $shedule->sheduledstudents()->save($shedule_std);
                    }
                    return redirect()->route('ownershedulelist')->with('successmsg', 'Shedule Created Seccessfuly !!');
                }
            }
        }


        // if($select_instructor){

        // }

    }

    public function nothing(){
        //
    }

    public function test(){
        //
    }

}
