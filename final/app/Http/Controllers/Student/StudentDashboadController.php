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
            // $firstattend =
        }

        $fristmonth = date('M', strtotime($firstattend));
        $f_firstday = date('Y-m-01', strtotime($fristmonth));
        $f_lastday = date('Y-m-t', strtotime($fristmonth));

        $secondmonth = date('M', strtotime('+1 month', strtotime($fristmonth)));
        $s_firstday = date('Y-m-01', strtotime($secondmonth));
        $s_lastday = date('Y-m-t', strtotime($secondmonth));

        $thirdmonth = date('M', strtotime('+2 month', strtotime($fristmonth)));
        $t_firstday = date('Y-m-01', strtotime($thirdmonth));
        $t_lastday = date('Y-m-t', strtotime($thirdmonth));

        $fourthmonth = date('M', strtotime('+3 month', strtotime($fristmonth)));
        $fo_firstday = date('Y-m-01', strtotime($fourthmonth));
        $fo_lastday = date('Y-m-t', strtotime($fourthmonth));

//================================= FRIST MONTH =======================================
        // first month present attendance
        $fristmonthpresent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$f_firstday, $f_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 1);
        }])->get();

        // first month absent attendance
        $fristmonthabsent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$f_firstday, $f_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 0);
        }])->get();

        $f_p_count = 0;
        foreach ($fristmonthpresent as $present) {
            if($present->attendance_count == 1){
                $f_p_count += 1;
            }
        }

        $f_a_count = 0;
        foreach ($fristmonthabsent as $absent) {
            if($absent->attendance_count == 1){
                $f_a_count += 1;
            }
        }

        $f_values = [$f_p_count, $f_a_count];

//============================== SECOND MONTH ===================================
        // second month present attendance
        $secondmonthpresent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$s_firstday, $s_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 1);
        }])->get();

        // second month absent attendance
        $secondmonthabsent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$s_firstday, $s_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 0);
        }])->get();

        $s_p_count = 0;
        foreach ($secondmonthpresent as $present) {
            if($present->attendance_count == 1){
                $s_p_count += 1;
            }
        }

        $s_a_count = 0;
        foreach ($secondmonthabsent as $absent) {
            if($absent->attendance_count == 1){
                $s_a_count += 1;
            }
        }

        $s_values = [$s_p_count, $s_a_count];

//================================ THIRD MONTH ====================================
        // third month present attendance
        $thirdmonthpresent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$t_firstday, $t_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 1);
        }])->get();

        // third month absent attendance
        $thirdmonthabsent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$t_firstday, $t_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 0);
        }])->get();

        $t_p_count = 0;
        foreach ($thirdmonthpresent as $present) {
            if($present->attendance_count == 1){
                $t_p_count += 1;
            }
        }

        $t_a_count = 0;
        foreach ($thirdmonthabsent as $absent) {
            if($absent->attendance_count == 1){
                $t_a_count += 1;
            }
        }

        $t_values = [$t_p_count, $t_a_count];

//================================ FOURTH MONTH ====================================
        // third month present attendance
        $fourthmonthpresent = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$fo_firstday, $fo_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 1);
        }])->get();

        // third month absent attendance
        $fourthmonthabsent = OwnerShedule::whereHas('sheduledstudents' , function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->whereBetween('date', [$fo_firstday, $fo_lastday])->withcount(['attendance' => function($query){
            $query->where('attendance', 0);
        }])->get();

        $fo_p_count = 0;
        foreach ($fourthmonthpresent as $present) {
            if($present->attendance_count == 1){
                $fo_p_count += 1;
            }
        }

        $fo_a_count = 0;
        foreach ($fourthmonthabsent as $absent) {
            if($absent->attendance_count == 1){
                $t_a_count += 1;
            }
        }

        $fo_values = [$fo_p_count, $fo_a_count];

//=========================== FINAL VALUES =============================
        $months = [$fristmonth, $secondmonth, $thirdmonth, $fourthmonth];
        $presents = [$f_p_count, $s_p_count, $t_p_count, $fo_p_count];
        $absent = [$f_a_count, $s_a_count, $t_a_count, $fo_a_count];

        return view('student.studentdashboad',compact('student','studentcategory','posts', 'todayshedules', 'session_count', 'progress', 'presents', 'absent', 'months'));
    }
}
