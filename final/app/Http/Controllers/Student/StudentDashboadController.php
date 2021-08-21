<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\OwnerShedule;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\User;
use App\Posts;
use App\StudentCategory;
use App\VehicleCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class StudentDashboadController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $today = Carbon::now()->today();
        $student=Student::where('user_id',Auth::user()->id)->with('user')->get();
        $studentcategory=StudentCategory::where('user_id',Auth::user()->id)->get();
        $posts = Posts::with('user')->orderBy('updated_at', 'desc')->get();

        $todayshedules = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->where('date', $today)->get();

        $session_count =OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->count();

        // calculate progess
        $completed_session = Student::select('completed_session')->where('user_id', $user_id)->first();
        $total_session =  Student::where('user_id', $user_id)->select('total_session')->first();
        $comp = $completed_session->completed_session;
        $tot = $total_session->total_session;
        $progress = ( $comp / $tot) * (100);

        $attendances = OwnerShedule::with('attendance')->whereHas('sheduledstudents' , function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->get();
        if (count($attendances) != 0) {
            $firstattend = $attendances[0]->date;
        }else{
            $start = Student::where('user_id', $user_id)->select('created_at')->first();
            $firstattend = $start->created_at;
        }
        $fristmonth = date('M', strtotime($firstattend));
        $months = [];
        for ($i=0; $i <4 ; $i++) {
            $month = date('M', strtotime("+$i month", strtotime($fristmonth)));
            $months[] = $month;
        }
        $presents = [];
        $absents = [];
        foreach($months as $month){
            $firstday = date('Y-m-01', strtotime($month));
            $lastday = date('Y-m-t', strtotime($month));

            $present = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
                $query->where('student_id', $user_id);
            })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function($query) use($user_id){
                $query->where('user_id', $user_id)->where('attendance', 1);
            })->get();

            $presents[] = count($present);

            $absent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
                $query->where('student_id', $user_id);
            })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function($query) use($user_id){
                $query->where('user_id', $user_id)->where('attendance', 0);
            })->get();

            $absents[] = count($absent);
        }

        return view('student.studentdashboad',compact('student','studentcategory','posts', 'todayshedules', 'session_count', 'progress', 'presents', 'absents', 'months'));
    }
}
