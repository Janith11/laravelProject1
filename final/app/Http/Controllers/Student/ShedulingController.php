<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\OwnerShedule;
use App\SheduledStudents;
use App\TimeSlots;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ShedulingController extends Controller
{

    public $date;

    public function index(){
        return view('student.sheduling.sheduling');
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

        if ($date <= $today) {
            return back()->with('errormsg', 'Selected date is past date !!');
        }else{

            $this->date = $date;
            $select_date = $this->date;

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

            return view('student.sheduling.settimeslot', compact('time_table', 'select_date'));
        }

    }

}
