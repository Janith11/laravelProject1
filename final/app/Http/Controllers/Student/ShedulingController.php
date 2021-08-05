<?php

namespace App\Http\Controllers\Student;

use App\AlertForStudent;
use App\Http\Controllers\Controller;
use App\OwnerShedule;
use App\SheduleAlert;
use App\SheduledStudents;
use App\Student;
use App\TimeSlots;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// active(upcomming) = 1
// canceled = 0
// complete = 2
// incomplate = 3
// request = 4

class ShedulingController extends Controller
{

    public function index(){
        $today = Carbon::now()->today();
        $user_id = Auth::user()->id;
        $today_sessions = OwnerShedule::with(['sheduledstudents' => function($query) use($user_id){
            $query->where('student_id', $user_id);
        }])->where('date', $today)->whereIn('shedule_status', [1, 2])->get();

        // calculate grogess
        $completed_session = Student::select('completed_session')->where('user_id', $user_id)->first();
        $total_session =  Student::where('user_id', $user_id)->select('total_session')->first();
        $comp = $completed_session->completed_session;
        $tot = $total_session->total_session;
        $progress = ( $comp / $tot) * (100);

        return view('student.sheduling.sheduling', compact('today_sessions', 'progress', 'total_session', 'completed_session'));
    }

    public function events($id){

        $attendance = SheduledStudents::with('ownershedule')->where('student_id',$id)->get();
        $responses = [];
        foreach ($attendance as $attend) {
            $row = [];
            $row['title'] = $attend->ownershedule->title;
            $row['color'] = $attend->ownershedule->color;
            $row['textColor'] = $attend->ownershedule->textColor;
            $row['date'] = $attend->ownershedule->date;
            array_push($responses, $row);
        }
        return response()->json($responses);
    }

    public function checkdate($date){

        $today = Carbon::now()->today();
        $user_id = Auth::user()->id;
        $total_session = Student::where('user_id', Auth::user()->id)->select('total_session')->first();
        $completed_session = Student::where('user_id', Auth::user()->id)->select('completed_session')->first();

        if ($date <= $today) {
            return back()->with('errormsg', 'Selected date is past date !!');
        }else{

            if ($total_session->total_session <= $completed_session->completed_session) {
                return back()->with('errormsg', 'You have already completed your total sessions !!');
            }else{

                $select_dateshedules = OwnerShedule::with(['sheduledstudents' => function($query) use($user_id){
                    $query->where('student_id', $user_id);
                }])->where('date', $date)->count();

                if ($select_dateshedules > 0) {
                    return back()->with('errormsg', 'You Already have session on this day !!');
                }

                $select_date = $date;

                $day_name = date('l', strtotime($select_date));
                $weekday_id = 0;

                if ($day_name == 'Monday') {
                    $weekday_id = 1;
                }elseif ($day_name == 'Tuesday') {
                    $weekday_id = 2;
                }elseif ($day_name == 'Wednesday') {
                    $weekday_id = 3;
                }elseif ($day_name == 'Thursday') {
                    $weekday_id = 4;
                }elseif ($day_name == 'Friday') {
                    $weekday_id = 5;
                }elseif ($day_name == 'Saturday') {
                    $weekday_id = 6;
                }else{
                    $weekday_id = 7;
                }

                $time_table = TimeSlots::where('weekday_id', $weekday_id)->get();

                $timeslots = [];
                foreach ($time_table as $table) {
                    $timeslots[] = $table->time_slot;
                }
                $collecttimeslots = collect($timeslots);
                $student_counts = OwnerShedule::where('date', $select_date)->whereIn('time', $collecttimeslots)->withcount('sheduledstudents')->get();

                $final_counts = [];
                foreach ($timeslots as $slot) {
                    foreach ($student_counts as $count) {
                        if ($slot == $count->time) {
                            $final_counts[$slot] = $count->sheduledstudents_count;
                        }
                    }
                }

                return view('student.sheduling.settimeslot', compact('time_table', 'select_date', 'final_counts'));

            }

        }

    }

    public function requestslot(Request $request){
        $slot_time = $request->timeslot;
        $special = $request->special_time;
        $date = $request->date;
        if (($slot_time == '') && ($special == '')) {
            return back()->with('errormsg', 'Empty Input !!');
        }
        if (($slot_time != '') && ($special != '')) {
            return back()->with('errormsg', 'Cannot Inputh Both !!');
        }
        if ($slot_time != '') {
            $shedule = OwnerShedule::create([
                'title' => 'session request',
                'date' => $date,
                'color' => '#90EE90',
                'textColor' => '#222944',
                'time' => $slot_time,
                'lesson_type' => $request->sessiontype,
                'shedule_status' => '4',
            ]);
        }
        if ($special != '') {
            $shedule = OwnerShedule::create([
                'title' => 'request shedule',
                'date' => $date,
                'color' => '#90EE90',
                'textColor' => '#222944',
                'time' => $special,
                'lesson_type' => $request->sessiontype,
                'shedule_status' => '4',
            ]);
        }
        $shedulestudent = SheduledStudents::create([
            'shedule_id' => $shedule->id,
            'student_id' => Auth::user()->id,
        ]);
        $student_name = Auth::user()->f_name.' '.Auth::user()->l_name;
        $shedulealert = SheduleAlert::create([
            'shedule_id' => $shedule->id,
            'message' => "You have a shedule request from $student_name",
        ]);
        $alertforowner = AlertForStudent::create([
            'shedulealert_id' => $shedulealert->id,
            'student_id' => 1,
            'alert_status' => 0,
        ]);
        return redirect()->route('studentsheduling')->with('succesmsg', 'Your Session request successfully send !!');
    }

    public function completedshedules(){
        $user_id = Auth::user()->id;
        $shedules = OwnerShedule::with(['sheduledstudents' => function($query) use($user_id){
            $query->where('student_id', $user_id);
        }])->where('shedule_status', 2)->get();
        return view('student.sheduling.progressdetails', compact('shedules'));
    }

    public function pendingrequest(){
        $user_id = Auth::user()->id;
        $shedules = OwnerShedule::with(['sheduledstudents' => function($query) use($user_id){
            $query->where('student_id', $user_id);
        }])->where('shedule_status', 4)->get();
        return view('student.sheduling.pendingrequest', compact('shedules'));
    }

}
