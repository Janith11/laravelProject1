<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\TimeSlots;
use App\TimeTable;
use App\WeekDay;
use App\Instructor;
use App\User;
use App\InstructorWorkingTimeSlot;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function index(){
        $instructor=Instructor::with('user')->get();
        $timetable = WeekDay::with('timeslots')->get();
        $instructordetails=InstructorWorkingTimeSlot::with('releventinstructor')->get();
        return view('owner.timetable.timetable', compact('timetable','instructor','instructordetails'));
    }

    public function inserttimeslot(Request $request){

        $this->validate($request, [
            'slot_time' => 'required',
            'instructor_id'=>'required'

        ]);
        $timeslot=TimeSlots::create([
            'weekday_id'=>$request->date_id,
            'time_slot'=>$request->slot_time,
            'slot_name'=>$request->slot_name,
        ]);
        $Iids=[];
        $Iids=$request['instructor_id'];
        foreach($Iids as $Iid){
            InstructorWorkingTimeSlot::create([
                'time_slot_id'=>$timeslot->id,
                'instructor_uid'=>$Iid
            ]);
        }
        return redirect()->route('timetable')->with('successmsg', 'Time Slot Adedd !!');
    }

    public function deletetimeslot($id){
        TimeSlots::find($id)->delete();
        InstructorWorkingTimeSlot::where('time_slot_id',$id)->delete();
        return redirect()->route('timetable')->with('successmsg', 'Time Slot Deleted !!');
    }
}
