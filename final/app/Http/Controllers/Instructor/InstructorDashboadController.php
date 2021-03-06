<?php

namespace App\Http\Controllers\Instructor;

use App\AlertForStudent;
use App\EmployeeAttendances;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Shedule;
use App\StudentCategory;
use App\VehicleCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;

class InstructorDashboadController extends Controller
{
    public function index(){
        $startof_month = Carbon::now()->startOfMonth();
        $endof_month = Carbon::now()->endOfMonth();
        $instructor_id = Auth::user()->id;
        $current_date = Carbon::today();
        $endDate = Carbon::today()->addDays(7);

        $today_shedules = Shedule::with('sheduledstudents')->where('instructor', $instructor_id)->where('date', $current_date)->where('shedule_status', 1)->get();

        $instructor_shedules = Shedule::whereHas('sheduledstudents')->where('instructor', $instructor_id)->whereBetween('date', [$current_date, $endDate])->count();

        $shedule_alerts = AlertForStudent::where('student_id', $instructor_id)->where('alert_status', 0)->count();

        $user_details = Instructor::with('user')->where('user_id', $instructor_id)->get();

        $thismonth_attend = EmployeeAttendances::where('user_id', $instructor_id)->whereBetween('date', [$startof_month, $endof_month])->where('status', 1)->count();

        $thismonth_leave = EmployeeAttendances::where('user_id', $instructor_id)->whereBetween('date', [$startof_month, $endof_month])->where('status', 3)->count();
        // return $user_details;

        $trainingcategories = StudentCategory::where('user_id', $instructor_id)->get();

        $categories = VehicleCategory::all();

        return view('instructor.instructordashboad',compact('user_details','today_shedules', 'instructor_shedules', 'shedule_alerts', 'thismonth_attend', 'thismonth_leave', 'trainingcategories', 'categories'));
    }

    public function instructorallevents(){
        $instructor_id = Auth::user()->id;
        $shedules = Shedule::where('instructor', $instructor_id)->get();
        return response()->json($shedules);
    }
}
