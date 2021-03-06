<?php

namespace App\Http\Controllers\Instructor;

use App\AlertForStudent;
use App\Attendance;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Shedule;
use App\SheduleAlert;
use App\SheduledStudents;
use App\Student;
use App\StudentCategory;
use App\StudentProgress;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class ShedulingController extends Controller
{
    public function todaysheduledetails($id){
        $result = Shedule::with('sheduledstudents')->where('id', $id)->get();

        // get read/unread details
        $allalert = SheduleAlert::where('shedule_id', $id)->get();
        $alert_ids = [];
        foreach ($allalert as $alert) {
            $alert_ids[] = $alert->id;
        }
        $alert_for_std = AlertForStudent::where('shedulealert_id', $alert_ids[0])->get();
        $total_alert = count($alert_for_std);
        $read_alert = AlertForStudent::where('shedulealert_id', $alert_ids[0])->where('alert_status', 1)->count();
        $alert_id = $alert_ids[0];

        //get instructor details
        $instructors = [];
        foreach($result as $res){
            $instructors[] = $res->instructor;
        }
        $instructor = collect($instructors);
        $instructor_details = Instructor::with('user')->whereIn('user_id', $instructor)->get();

        // get students details
        $students = [];
        foreach($result as $res){
            foreach ($res->sheduledstudents as $student) {
                $students[] = $student->student_id;
            }
        }
        $student = collect($students);
        $students_details = Student::with(['user', 'alertforstudents' => function($query) use($alert_id){
            $query->where('shedulealert_id', $alert_id);
        }])->whereIn('user_id', $student)->get();

        return view('instructor.shedules.todayshedulesdetails', compact('result', 'instructor_details', 'students_details', 'total_alert', 'read_alert'));
    }

    public function reportattendance($id){
        $shedule = Shedule::with('sheduledstudents')->where('id', $id)->get();

        // get students details
        $students = [];
        foreach($shedule as $res){
            foreach ($res->sheduledstudents as $student) {
                $students[] = $student->student_id;
            }
        }
        $student = collect($students);
        $students_details = Student::with('user')->whereIn('user_id', $student)->get();

        return view('instructor.shedules.reportattendance', compact('shedule', 'students_details'));
    }

    public function saveattendance(Request $request){
        // 0 - absent
        // 1 - attend
        // 2 - all are absent
        // 3 - report attendance

        $students = $request->students;
        $empty = $request->empty;
        $shedule_id = $request->id;

        if (empty($students) && empty($empty) ) {
            return back()->with('errormsg', 'Something wrong with your inputs');
        } elseif( !empty($students) && !empty($empty) ){
            return back()->with('errormsg', 'Something wrong with your inputs');
        }elseif(!empty($students) && empty($empty) ){
            $students_list = collect($students);
            $allattendance = Attendance::where('shedule_id', $shedule_id)->whereIn('user_id', $students_list)->get();
            $sheduleid_list = [];
            foreach ($allattendance as $attendance) {
                $sheduleid_list[] = $attendance->id;
            }
            foreach ($sheduleid_list as $id) {
                $reportattendance = Attendance::find($id);
                $reportattendance->attendance = 3;
                $reportattendance->save();
            }

            $category =  Shedule::where('id', $shedule_id)->first();
            $vcat = $category->vahicle_category;
            foreach($students as $std){
                $var = "session-grade-".$std;
                $grade = $request->$var;
                StudentProgress::create([
                    'shedule_id' => $shedule_id,
                    'user_id' => $std,
                    'category_code' => $vcat,
                    'grade' => $grade
                ]);
            }

            return redirect()->route('instructor.instructordashboad')->with('successmsg', 'Report attendance successfully ');
        }else{
            $attendances = Attendance::where('shedule_id', $shedule_id)->get();
            foreach($attendances as $attend){
                $attendanceids[] = $attend->id;
            }
            foreach($attendanceids as $id){
                $attend = Attendance::find($id);
                $attend->attendance = 2;
                $attend->save();
            }

            return redirect()->route('instructor.instructordashboad')->with('successmsg', 'Report attendance successfully ');
        }
    }

    public function shedulepage(){
        $instructor_id = Auth::user()->id;
        $current_date = Carbon::today();

        $allshedules = Shedule::where('instructor', $instructor_id)->count();

        $date_month = Carbon::now()->subDays(30);
        $lastmonth_shedules = Shedule::where('instructor', $instructor_id)->whereBetween('date', [$date_month, $current_date])->count();

        $date_six_month = Carbon::now()->subDays(180);
        $lastsixmonth_shedules = Shedule::where('instructor', $instructor_id)->whereBetween('date', [$date_six_month, $current_date])->count();

        $date_year = Carbon::now()->subDays(365);
        $lastyear_shedules = Shedule::where('instructor', $instructor_id)->whereBetween('date', [$date_year, $current_date])->count();

        $today_shedules = Shedule::with('sheduledstudents')->where('instructor', $instructor_id)->where('date', $current_date)->where('shedule_status', 1)->get();

        return view('instructor.shedules.shedulelist', compact('today_shedules', 'lastmonth_shedules', 'lastsixmonth_shedules', 'lastyear_shedules', 'allshedules'));
    }

    public function lastthirtydays(){
        $instructor_id = Auth::user()->id;
        $current_date = Carbon::today();
        $date_month = Carbon::now()->subDays(30);
        $lastthirty_days = Shedule::where('instructor', $instructor_id)->whereBetween('date', [$date_month, $current_date])->get();
        return view('instructor.shedules.lastthirtydays', compact('lastthirty_days'));
        // return count($lastthirty_days);
    }

    public function lastsixmonth(){
        $instructor_id = Auth::user()->id;
        $current_date = Carbon::today();
        $date_six_month = Carbon::now()->subDays(180);
        $lastsix_month = Shedule::where('instructor', $instructor_id)->whereBetween('date', [$date_six_month, $current_date])->get();
        return view('instructor.shedules.lastsixmonth', compact('lastsix_month'));
    }

    public function lastyear(){
        $instructor_id = Auth::user()->id;
        $current_date = Carbon::today();
        $date_year = Carbon::now()->subDays(365);
        $lastyear = Shedule::where('instructor', $instructor_id)->whereBetween('date', [$date_year, $current_date])->get();
        return view('instructor.shedules.lastyear', compact('lastyear'));
    }

    public function allshedules(){
        $instructor_id = Auth::user()->id;
        $current_date = Carbon::today();
        $allshedules = Shedule::where('instructor', $instructor_id)->get();
        return view('instructor.shedules.allshedules', compact('allshedules'));
    }

    public function calendar(){
        return view('instructor.shedules.calendar');
    }

    public function calendarevents(){
        $instructor_id = Auth::user()->id;
        $setone = Shedule::whereHas('sheduledstudents')->where('instructor', $instructor_id)->get();
        // return $settwo;
        $responses = [];
        foreach($setone as $one){
            $row = [];
            if ($one->shedule_status == 1) {
                $row['title'] = $one->title;
                $row['color'] = '#35FF35';
                $row['textColor'] = '#040124';
                $row['date'] = $one->date;
                array_push($responses, $row);
            }elseif ($one->shedule_status == 2) {
                $row['title'] = $one->title;
                $row['color'] = '#03011F';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->date;
                array_push($responses, $row);
            }elseif ($one->shedule_status == 3) {
                $row['title'] = $one->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->date;
                array_push($responses, $row);
            }else{
                $row['title'] = $one->title;
                $row['color'] = '#FF891A';
                $row['textColor'] = '#040124';
                $row['date'] = $one->date;
                array_push($responses, $row);
            }
        }
        // $shedules = Shedule::where('instructor', $instructor_id)->get();
        return response()->json($responses);
    }

}
