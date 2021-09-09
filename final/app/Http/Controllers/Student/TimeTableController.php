<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WeekDay;
use App\InstructorWorkingTimeSlot;


class TimeTableController extends Controller
{
    public function index(){
        
        $timetable = WeekDay::with('timeslots')->get();
        $instructordetails=InstructorWorkingTimeSlot::with('releventinstructor')->get();
        return view('student.timetable.viewtimetable', compact('timetable','instructordetails'));
    }
}
