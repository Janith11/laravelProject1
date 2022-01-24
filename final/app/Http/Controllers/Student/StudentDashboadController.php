<?php

namespace App\Http\Controllers\Student;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Shedule;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\User;
use App\Posts;
use App\SheduledStudents;
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

        $todayshedules = Shedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->where('date', $today)->get();

        $session_count =Shedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->count();

        // calculate progess
        $completed_session = Student::select('completed_session')->where('user_id', $user_id)->first();
        $total_session =  Student::where('user_id', $user_id)->select('total_session')->first();
        $comp = $completed_session->completed_session;
        $tot = $total_session->total_session;
        $progress = ( $comp / $tot) * (100);

        $attendances = Shedule::with('attendance')->whereHas('sheduledstudents' , function($query) use($user_id){
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
        $yearbreak = 0;
        $janIndex = 0;
        if(in_array('Jan', $months)){
            $yearbreak = 1;
            $janIndex = array_search('Jan', $months);
        }
        $presents = [];
        $absents = [];
        foreach($months as $key => $month){
            if($yearbreak != 0){
                if($key < $janIndex){
                    $prevyear = date("Y",strtotime("-1 year"));
                    $firstday = date("Y-m-01",strtotime("$prevyear-$month"));
                    $lastday = date("Y-m-t",strtotime("$prevyear-$month"));
                    $present = Shedule::whereHas('sheduledstudents', function ($query) use ($user_id) {
                        $query->where('student_id', $user_id);
                    })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function ($query) use ($user_id) {
                        $query->where('user_id', $user_id)->where('attendance', 1);
                    })->get();

                    $presents[] = count($present);

                    $absent = Shedule::whereHas('sheduledstudents', function ($query) use ($user_id) {
                        $query->where('student_id', $user_id);
                    })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function ($query) use ($user_id) {
                        $query->where('user_id', $user_id)->where('attendance', 0);
                    })->get();

                    $absents[] = count($absent);
                }else{
                    $firstday = date('Y-m-01', strtotime($month));
                    $lastday = date('Y-m-t', strtotime($month));

                    $present = Shedule::whereHas('sheduledstudents', function ($query) use ($user_id) {
                        $query->where('student_id', $user_id);
                    })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function ($query) use ($user_id) {
                        $query->where('user_id', $user_id)->where('attendance', 1);
                    })->get();

                    $presents[] = count($present);

                    $absent = Shedule::whereHas('sheduledstudents', function ($query) use ($user_id) {
                        $query->where('student_id', $user_id);
                    })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function ($query) use ($user_id) {
                        $query->where('user_id', $user_id)->where('attendance', 0);
                    })->get();

                    $absents[] = count($absent);
                }
            }else{
                $firstday = date('Y-m-01', strtotime($month));
                $lastday = date('Y-m-t', strtotime($month));

                $present = Shedule::whereHas('sheduledstudents', function ($query) use ($user_id) {
                    $query->where('student_id', $user_id);
                })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id)->where('attendance', 1);
                })->get();

                $presents[] = count($present);

                $absent = Shedule::whereHas('sheduledstudents', function ($query) use ($user_id) {
                    $query->where('student_id', $user_id);
                })->whereBetween('date', [$firstday, $lastday])->whereHas('attendance', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id)->where('attendance', 0);
                })->get();

                $absents[] = count($absent);
            }
        }

        // bot start ===================================================================
        $user_id = Auth::user()->id;

        // theory and practicle sessions
        $shedules = SheduledStudents::with('shedule')->whereHas('shedule')->where('student_id', $user_id)->get();
        $theoryshedulescount = 0;
        $practicleshedulescount = 0;
        foreach($shedules as $shedule){
            if($shedule->Shedule->lesson_type == 'theory'){
                $theoryshedulescount += 1;
            }else{
                $practicleshedulescount += 1;
            }
        }

        // about theory exam
        $theoryexam = Exam::where('user_id', $user_id)->where('type', 'theory')->where('result', 'pass')->count();

        // about practicle exam
        $practicleexam = Exam::where('user_id', $user_id)->where('type', 'practical')->where('result', 'pass')->count();

        // about training categories
        $categories = StudentCategory::where('user_id', $user_id)->count();
        $trainingcategories = StudentCategory::where('user_id', $user_id)->where('tstatus', 'Without Training')->count();

        // total sessions
        $details = Student::where('user_id', $user_id)->get();
        $totalsession = $tot;
        $completedsession = $comp;
        $amount = 0;
        $paid = 0;
        foreach($details as $detail){
            $amount += $detail->total_fee;
            $paid += $detail->paid_amount;
        }

        $botmsg = '';

        // inertial stage
        if ( ($theoryexam == 0) && ( $theoryshedulescount == 0 )) {
            $botmsg = $botmsg.'You can apply your first theory session and also you can update your profile details';
        }

        // hoping to face theory examination
        if( ($theoryexam == 0) && ( $theoryshedulescount > 0 ) ){
            $botmsg = $botmsg.'Ready for your theory exam. The exam date will be informed by owner';
        }

        // theory examination pass
        if( ($theoryexam > 0) && ( $theoryshedulescount > 0 ) && ($practicleexam == 0) && ($practicleshedulescount == 0) ){
            $botmsg = $botmsg.'<strong>Condratulations !!</strong>. You passed your theory examination. Now you can apply for practicle sessions';
        }
        
        // hoping to face practicle examination
        if( ($theoryexam > 0) && ( $theoryshedulescount > 0 ) && ($practicleexam == 0) && ($practicleshedulescount > 0) ){
            $botmsg = $botmsg.'Ready for your practicle examination. Exam date will be informed by owner';
        }

        // completed all session
        if( ($totalsession == $completedsession) && ($practicleexam == 0) ){
            if( $amount != $paid ){
                $botmsg = $botmsg.'Your not complete your payment.';
            }
            $botmsg = $botmsg.'You successfully complete your class sessions. If your not satisfied your practicle knowladge you can request more schedules in the more schedule section or you can ready for your practicle exam. Exam date will be informed by owner';
        }

        // get lysence
        if($practicleexam > 0){
            $botmsg = $botmsg.'Condratulations. now your successfully completed your class. your account will be deleted as soon as posible. thnak you for join with us';
        }

        // bot end

        return view('student.studentdashboad',compact('student','studentcategory','posts', 'todayshedules', 'session_count', 'progress', 'presents', 'absents', 'months', 'botmsg'));
    }
}
