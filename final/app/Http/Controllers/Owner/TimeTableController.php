<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\TimeSlots;
use App\TimeTable;
use App\WeekDay;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function index(){
        $timetable = WeekDay::with('timeslots')->get();
        return view('owner.timetable.timetable', compact('timetable'));
    }

    public function inserttimeslot(Request $request){

        $this->validate($request, [
            'slot_time' => 'required',
        ]);

        $date = $request->date_id;
        $name = $request->slot_name;
        $time = $request->slot_time;

        $slot[] = [
            'time_slot' => $time,
            'slot_name' => $name,
        ];

        $day_id = WeekDay::find($date);

        $day_id->timeslots()->createMany($slot);

        return redirect()->route('timetable')->with('successmsg', 'Time Slot Adedd !!');
    }

    public function deletetimeslot($id){
        TimeSlots::find($id)->delete();
        return redirect()->route('timetable')->with('successmsg', 'Time Slot Deleted !!');
    }
}
