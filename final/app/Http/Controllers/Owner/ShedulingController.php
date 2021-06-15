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
        // active(upcomming) = 1
        // canceled = 0
        // complete = 2
        // uncomplate = 3

        $from = date('Y-m-01');
        $to = date('Y-m-t');
        $current = date('Y-m-d');
        $prevhour = date('H') - 1;
        $currenthour = date('H');

        $check = OwnerShedule::select('id')->whereBetween('date', [$from, $current])->where('shedule_status', '=', 1)->get();

        if(count($check) > 0){
            foreach ($check as $key => $value) {
                $result = OwnerShedule::find($value->id);
                $result->shedule_status = 3;
                $result->color = "#831D26";
                $result->textColor = "#FFFFFF";
                $result->save();
            }
        }

        $shedules = OwnerShedule::where('shedule_status', '=', 1)->with('SheduledStudents')->get();
        $totalshedules = OwnerShedule::whereBetween('date', [$from, $to])->get();
        $complateshedules = OwnerShedule::where('shedule_status', '=', 2)->get();
        $canceledshedules = OwnerShedule::where('shedule_status', '=', 0)->get();
        $upcommingshedule = OwnerShedule::whereBetween('date', [$current , $to])->get();
        $uncompleteshedules = OwnerShedule::where('shedule_status', '=', 3)->get();
        return view('owner.sheduling.shedulelist', compact('shedules', 'totalshedules', 'complateshedules', 'canceledshedules', 'upcommingshedule', 'uncompleteshedules'));
        return count($upcommingshedule);
    }

    public function addshedule(){
        return view('owner.sheduling.addshedule');
    }

    public function allevents(){
        $shedules = OwnerShedule::all();
        return response()->json($shedules);
    }

    public function checkinput($date){
        $current_date = date("Y-m-d");
        $start_date = strtotime($current_date);
        $end_date = strtotime($date);
        $result = ($end_date - $start_date)/60/60/24;
        $selectdayname = date('l', strtotime($date));

        $timeslots = WeekDay::where('day_name', $selectdayname)->with('timeslots')->get();
        $timeslotscount = WeekDay::where('day_name', $selectdayname)->withcount('timeslots')->get();
        $shedules = OwnerShedule::where('date', $date)->with('SheduledStudents')->get();
        $shedulescount = OwnerShedule::where('date', $date)->withcount('SheduledStudents')->get();

        if($result >= 0){
            return view('owner.sheduling.settimeslot', ['date' => $date, 'timeslots' => $timeslots, 'shedules' => $shedulescount, 'timeslotscount' => $timeslotscount]);
            // return $shedulescount;
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

        $shedule->title = $request->shedulename;
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

    // validate time slot
    public function setsheduletime(Request $request){
        $currentdate = date('Y-m-d');
        $date = $request->date;

        $instructors = Instructor::with('user')->get();

        $students_id = OwnerShedule::with('sheduledstudents')->where('date', $date)->get();

        $studentwithshedule = [];
        foreach ($students_id as $key => $value) {
            foreach ($value->sheduledstudents as $id) {
                $studentwithshedule[] = $id->student_id;
            }
        }

        $havesheduled = collect($studentwithshedule);

        if (count($studentwithshedule) > 0) {
            $filterstudents = Student::with('user')->whereNotIn('user_id', $havesheduled)->get();
            if (count($filterstudents) == 0) {
                return redirect()->route('calendar')->with('errormessage', 'Cannot add new shedule on this day becouse of all student have session on this day !!');
            }else{
                $students = $filterstudents;
            }
        }else{
            $students = Student::with('user')->get();
        }

        if ($request->has('slotdivider')) {
            $custome_slot_name = $request->customeslotname;
            $custome_time_slot = $request->custometime;
            if ($custome_time_slot == '') {
                return back()->with('errormessage', 'If you choose custome slot you have to enter time slot !!');
            }else{
                $time = $request->custometime;
                return view('owner.sheduling.createshedule', compact('time', 'date', 'instructors', 'students'));
                // return $students;
            }
        }else{
            $slot = $request->slottime;
            if($slot == ''){
                return back()->with('errormessage', 'Please choose time slot or define custome one !!');
            }else{
                $time = $slot[0];
                return view('owner.sheduling.createshedule', compact('time', 'date', 'instructors', 'students'));
                // return $students;
            }
        }
    }

    public function viewdetails($id){
        $shedule = OwnerShedule::find($id)->with('SheduledStudents')->get();
        return view('owner.sheduling.viewsheduledetails', compact('shedule'));
    }

}
