<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\OwnerShedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;

class InstructorDashboadController extends Controller
{
    public function index(){
        $instructor_id = Auth::user()->id;
        $current_date = Carbon::today();
        $endDate = Carbon::today()->addDays(7);
        $today_shedules = OwnerShedule::with('sheduledstudents')->where('instructor', $instructor_id)->where('date', $current_date)->where('shedule_status', 1)->get();
        $instructor_shedules = OwnerShedule::where('instructor', $instructor_id)->whereBetween('date', [$endDate, $current_date])->get();
        // return $instructor_shedules;
        return view('instructor.instructordashboad',compact('today_shedules', 'instructor_shedules'));
    }

    public function instructorallevents(){
        $instructor_id = Auth::user()->id;
        $shedules = OwnerShedule::where('instructor', $instructor_id)->get();
        return response()->json($shedules);
    }
}
