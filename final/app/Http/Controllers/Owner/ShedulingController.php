<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
use App\SheduledStudents;
use App\Student;
use App\TimeTable;
use App\WeekDay;
use Dotenv\Regex\Result;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShedulingController extends Controller
{
    public function index(){
        $shedules = OwnerShedule::where('shedule_status', '=', 1)->with('SheduledStudents')->get();
        return view('owner.sheduling.shedulelist', compact('shedules'));
    }

    public function addshedule(){
        return view('owner.sheduling.addshedule');
    }

    public function allevents(){
        $shedules = OwnerShedule::where('shedule_status', '=', 1)->get();
        return response()->json($shedules);
    }

    public function checkinput($date){
        $current_date = date("Y-m-d");
        $start_date = strtotime($current_date);
        $end_date = strtotime($date);
        $result = ($end_date - $start_date)/60/60/24;

        $timeslots = WeekDay::where('day_name', date('l'))->with('timeslots')->get();

        if($result >= 0){
            return view('owner.sheduling.settimeslot', ['date' => $date, 'timeslots' => $timeslots]);
            // return $timeslots;
        }else{
            return back()->with('errormsg', 'Cannot add Shedule for previous Day !!');
        }
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

                    $check = [];
                    $date = $request->date;
                    foreach ($select_students as $select_std) {
                        $result = OwnerShedule::with('sheduledstudents')->whereHas("sheduledstudents",
                            function ($query) use ($date, $select_std) {
                                $query->where("date",$date)->where('student_id', $select_std);
                            }
                        )->count();
                        $check[$select_std] = $result;
                    }

                    $message = '';
                    foreach($check as $s_id => $value){
                        if($value == 1){
                            $message = $message." Student $s_id has another session on this day !!\n\n";
                        }
                    }

                    if(strlen($message) != 0){
                        return back()->with('chooseerror', $message);
                    }else{
                        $shedule->instructor = $select_instructor[0];
                        $shedule->save();

                        $students = [];
                        foreach($select_students as $student){
                            $students[] = [
                                'student_id' => $student
                            ];
                        }

                        $shedule->sheduledstudents()->createMany($students);

                        return redirect()->route('ownershedulelist')->with('successmsg', 'Shedule Created Seccessfuly !!');
                    }
                }
            }
        }
    }

}
