<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\Shedule;
use App\SheduleAlert;
use App\AlertForStudent;
use App\Attendance;
use App\CompanyDetails;
use App\EmplooyeeLeave;
use App\EmployeeAttendances;
use App\Exam;
use App\Http\Requests\CreateScheduleRequest;
use App\SheduledStudents;
use App\SheduleRequest;
use App\ShedulingType;
use App\Student;
use App\StudentCategory;
use App\TimeSlots;
use App\TimeTable;
use App\VehicleCategory;
use App\WeekDay;
use Carbon\Carbon;
use Dotenv\Regex\Result;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// active(upcomming) = 1
// complete = 2, #03011F, #FFFFFF
// canceled = 3, #FF2957, #FFFFFF
// incomplate = 4, #FF891A, #040124

// student
// pending = 0, #0FD8F3, #040124
// confirm = 1, #35FF35, #040124
// complete = 2, #03011F, #FFFFFF
// cancel = 3, #FF2957, #FFFFFF
// incomplete = 4, #FF891A, #040124

// shedule_status
// pending = 0, #0FD8F3, #040124
// accept = 1, #35FF35, #040124
// cancel = 2, #FF2957, #FFFFFF

class ShedulingController extends Controller
{

    public function index(){

        $prevhour = date('H') - 1;
        $currenthour = date('H');

        $date_month = Carbon::now()->subDays(30);
        $date_last_month = Carbon::now()->subDays(60);
        $date_six_month = Carbon::now()->subDays(180);
        $date_year = Carbon::now()->subDays(365);
        $current = Carbon::today();
        $endDate = Carbon::today()->addDays(7);

        $shedules = Shedule::where('shedule_status', '=', 1)->with('SheduledStudents')->get();

        // next seven days
        $next_shedules = Shedule::whereBetween('date', [$current, $endDate])->where('shedule_status', '=', 1)->get();

        // allshedules
        $totalshedules = Shedule::count();

        // today shedules
        $today_shedules = Shedule::where('date', $current)->count();

        // total shedule for statistics
        $totalshedules_month = Shedule::whereBetween('date', [$date_month, $current])->get();
        $totalshedules_lastmonth = Shedule::whereBetween('date', [$date_last_month, $date_month])->get();
        $totalshedules_sixmonth = Shedule::whereBetween('date',  [$date_six_month, $current])->get();
        $totalshedules_year = Shedule::whereBetween('date', [$date_year, $current])->get();

        // complete shedules for statistics
        $complateshedules_month = Shedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 2)->get();
        $complateshedules_lastmonth = Shedule::whereBetween('date', [$date_last_month, $date_month])->where('shedule_status', '=', 2)->get();
        $complateshedules_sixmonth = Shedule::whereBetween('date', [$date_six_month, $current])->where('shedule_status', '=', 2)->get();
        $complateshedules_year = Shedule::whereBetween('date', [$date_year, $current])->where('shedule_status', '=', 2)->get();

        // cancel shedules for statistics
        $canceledshedules_month = Shedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 3)->get();
        $canceledshedules_lastmonth = Shedule::whereBetween('date', [$date_last_month, $date_month])->where('shedule_status', '=', 3)->get();
        $canceledshedules_sixmonth = Shedule::whereBetween('date', [$date_six_month, $current])->where('shedule_status', '=', 3)->get();
        $canceledshedules_year = Shedule::whereBetween('date', [$date_year, $current])->where('shedule_status', '=', 3)->get();

        // uncomplete shedules for statistics
        $uncompleteshedules_month = Shedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 4)->get();
        $uncompleteshedules_lastmonth = Shedule::whereBetween('date', [$date_last_month, $date_month])->where('date', '>=', $date_month)->where('shedule_status', '=', 4)->get();
        $uncompleteshedules_sixmonth = Shedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 4)->get();
        $uncompleteshedules_year = Shedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 4)->get();

        // scheduling type
        $shedulingtype = ShedulingType::select('type')->first();
        $type = $shedulingtype->type;

        return view('owner.sheduling.shedulelist', compact('shedules','totalshedules', 'today_shedules', 'totalshedules_month', 'totalshedules_lastmonth', 'next_shedules','totalshedules_sixmonth', 'totalshedules_year','complateshedules_month','complateshedules_lastmonth', 'complateshedules_sixmonth', 'complateshedules_year', 'canceledshedules_month','canceledshedules_lastmonth', 'canceledshedules_sixmonth','canceledshedules_year', 'uncompleteshedules_month', 'uncompleteshedules_lastmonth', 'uncompleteshedules_sixmonth', 'uncompleteshedules_year', 'type'));
        // return $today_shedules;
    }

    public function calender(){
        return view('owner.sheduling.calender');
    }

    public function allevents(){
        $setone = Shedule::whereHas('sheduledstudents')->get();
        $settwo = SheduleRequest::with('Shedules')->whereIn('shedule_status', [0, 2])->get();
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
        foreach ($settwo as $two) {
            $row = [];
            if ($two->shedule_status == 0) {
                $row['title'] = $two->Shedules->title;
                $row['color'] = '#0FD8F3';
                $row['textColor'] = '#040124';
                $row['date'] = $two->Shedules->date;
                array_push($responses, $row);
            }elseif ($two->shedule_status == 2) {
                $row['title'] = $two->Shedules->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $two->Shedules->date;
                array_push($responses, $row);
            }
        }
        return response()->json($responses);
    }

    // ====================================== ADD NEW PART ===========================
    public function reupdateshedule($id, $date){
        $instructors = Instructor::with('user')->get();
        $shedules = Shedule::where('id', $id)->withCount('sheduledstudents')->get();

        // get free sudents
        $havesessions = Shedule::with('sheduledstudents')->whereHas('sheduledstudents')->where('date', $date)->get();
        $havesessionids = [];
        foreach($havesessions as $session){
            foreach ($session->sheduledstudents as $student) {
                $havesessionids[] = $student->student_id;
            }
        }
        $filterids = collect($havesessionids);
        $students = Student::with('user')->whereNotIn('user_id', $filterids)->get();

        return view('owner.sheduling.processupdateschedule', compact('shedules', 'instructors', 'students'));
    }

    public function saveupdateschedule(Request $request){

        $this->validate($request, [
            'students' => 'required'
        ]);

        $schedule_id = $request->id;
        $students = $request->students;

        // insert extra students
        $alert_id = SheduleAlert::where('shedule_id', $schedule_id)->select('id')->first();
        foreach($students as $student){
            SheduledStudents::create([
                'shedule_id' => $schedule_id,
                'student_id' => $student
            ]);
            AlertForStudent::create([
                'shedulealert_id' => $alert_id->id,
                'student_id' => $student,
                'alert_status' => 0
            ]);
            Attendance::create([
                'shedule_id' => $schedule_id,
                'user_id' => $student,
                'attendance' => 0,
            ]);
        }

        return redirect()->route('calendar')->with('successmsg', 'Shedule Updated Successfully !!');
    }
    // ====================================== END SECTION ============================

    public function viewdetails($id){
        $result = Shedule::where('id',$id)->with('SheduledStudents')->get();

        $check = Shedule::whereHas('shedulerequests', function($query) use($id){
            $query->where('shedule_id', $id);
        })->count();
        // return $check;
        if($check > 0){
            $shedule = SheduleRequest::with('Shedules')->where('shedule_id', $id)->get();
            $instructors = Instructor::with('user')->get();
            $students = Student::with('user')->get();
            return view('owner.sheduling.viewrequestsheduledetails', compact('shedule', 'instructors', 'students'));
        }else{
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
            foreach ($result as $res) {
                $instructors[] = $res->instructor;
            }
            $instructor = collect($instructors);
            $instructor_details = Instructor::with(['user' => function ($query) {
                $query->where('status', 1);
            }])->whereIn('user_id', $instructor)->get();

            // get students details
            $students = [];
            foreach ($result as $res) {
                foreach ($res->sheduledstudents as $student) {
                    $students[] = $student->student_id;
                }
            }
            $student = collect($students);
            $students_details = Student::with(['user', 'alertforstudents' => function ($query) use ($alert_id) {
                $query->where('shedulealert_id', $alert_id);
            }])->whereIn('user_id', $student)->get();

            return view('owner.sheduling.viewsheduledetails', compact('result', 'instructor_details', 'students_details', 'total_alert', 'read_alert'));
        }
    }

    public function allshedules(){
        $shedules = Shedule::orderBy('date', 'DESC')->get();
        return view('owner.sheduling.allshedules', compact('shedules'));
    }

    //cancel shedule
    public function cancel($id){
        $shedule = Shedule::where('id', $id)->get();
        return view('owner.sheduling.cancelshedule', compact('shedule'));
    }

    public function updateascancel(Request $request){
        $this->validate($request, [
            'reson' => 'required|min:30',
        ]);

        $id = $request->id;

        $cancel = Shedule::find($id);
        $cancel->color = '#FF2957';
        $cancel->textColor = '#FFFFFF';
        $cancel->shedule_status = 3;
        $cancel->save();

        $update_alert = SheduleAlert::where('shedule_id', $id)->get();
        $alert_id = [];
        foreach ($update_alert as $alert) {
            $alert_id[] = $alert->id;
        }
        $prev_alert = [];
        foreach ($update_alert as $alert) {
            $prev_alert[] = $alert->message;
        }
        $new_message = $prev_alert[0].". This Shedule is Cancel.".$request->reson;
        $updatealert = SheduleAlert::find($alert_id[0]);
        $updatealert->message = $new_message;
        $updatealert->save();

        $update_status = AlertForStudent::where('shedulealert_id', $alert_id[0])->get();
        $alert_students_id = [];
        foreach ($update_status as $updatestatus) {
            $alert_students_id[] = $updatestatus->id;
        }

        foreach ($alert_students_id as $student_id) {
            $result = AlertForStudent::find($student_id);
            $result->alert_status = 0;
            $result->save();
        }

        $attendance_list = Attendance::where('shedule_id', $id)->get();
        $attendances_list_id = [];
        foreach ($attendance_list as $attendance) {
            $attendances_list_id[] = $attendance->id;
        }
        foreach ($attendances_list_id as $id) {
            $attend = Attendance::find($id);
            $attend->attendance = 2;
            $attend->save();
        }

        return redirect()->route('Shedulelist')->with('successmsg', 'Sheduled cancel Successfully !! ');

    }

    public function todayshedules(){
        $current = Carbon::today();
        $today_shedules = Shedule::where('date', $current)->get();
        return view('owner.sheduling.todayshedules', compact('today_shedules'));
    }

    // complate shedule
    public function markascomplete($id){

        $shedule = Shedule::where('id', $id)->with('SheduledStudents')->get();
        $reports = Attendance::where('shedule_id', $id)->where('attendance', 3)->get();

        //get instructor details
        $instructors = [];
        foreach($shedule as $res){
            $instructors[] = $res->instructor;
        }
        $instructor = collect($instructors);
        $instructor_details = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }])->whereIn('user_id', $instructor)->get();

        // get students details
        $students = [];
        foreach($shedule as $res){
            foreach ($res->sheduledstudents as $student) {
                $students[] = $student->student_id;
            }
        }
        $student = collect($students);
        $students_details = Student::with('user')->whereIn('user_id', $student)->get();

        return view('owner.sheduling.markascomplete', compact('students_details', 'instructor_details', 'shedule', 'reports'));
    }

    public function saveascomplete(Request $request){

        $instructor = $request->instructor;
        $students = $request->students;

        if (empty($instructor)) {
            return back()->with('errormsg', 'Without instructor you cannot update shedule as complete !!');
        }else{
            if(empty($students)){
                return back()->with('errormsg', 'Without any students you cannot update shedule as complete !!');
            }else{
                $shedule_id = $request->id;

                // user id list
                $user_id_list = [];
                $user_id_list[0] = $instructor[0];
                foreach ($students as $student) {
                    $user_id_list[] = $student;
                }
                $user_list = collect($user_id_list);

                $attendances = Attendance::where('shedule_id', $shedule_id)->whereIn('user_id', $user_list)->get();

                $attendance_idlist = [];
                foreach ($attendances as $attendance) {
                    $attendance_idlist[] = $attendance->id;
                }

                $lists = [];
                foreach ($attendance_idlist as $id) {
                    $attend = Attendance::find($id);
                    $lists[] = $attend;
                }
                foreach ($lists as $list) {
                    $list->attendance = 1;
                    $list->save();
                }

                // update shedule as complete in owner shedule table
                $owner_shedule = Shedule::find($shedule_id);
                $owner_shedule->color = "#03011F";
                $owner_shedule->textColor = "#FFFFFF";
                $owner_shedule->shedule_status = 2;
                $owner_shedule->save();

                // update student total attendance
                $student_ids = collect($students);
                $studentdata = Student::whereIn('user_id', $student_ids)->get();
                $studenttableids = [];
                foreach ($studentdata as $data) {
                    $studenttableids[] = $data->id;
                }
                foreach ($studenttableids as $id) {
                    $std = Student::find($id);
                    $prev = $std->completed_session;
                    $prev += 1;
                    $std->completed_session = $prev;
                    $std->save();
                }
                return redirect()->route('todayshedules')->with('successmsg', 'Update shedule as Complete');

            }

        }

    }

    // my new functions ==========================================================
    public function owneraddschedule(){
        $categories = VehicleCategory::all();
        $studentslist = Student::with('user')->get();
        $instructorslist = Instructor::with('user')->get();
        return view('owner.sheduling.owneraddschedule', compact('categories', 'studentslist', 'instructorslist'));
    }

    public function getalltheorystudents(){
        $studentsids = Exam::where('type', 'theory')->where('result', 'fail')->select('user_id')->get();
        $ids = [];
        foreach($studentsids as $id){
            $ids[] = $id->user_id;
        }
        $students = Student::with('user')->whereIn('user_id', $ids)->get();
        return response()->json($students);
    }

    public function getautomanualstudents($category, $transmission){
        $students_ids = StudentCategory::where('category', $category)->where('transmission', $transmission)->where('tstatus', 'Training')->get();

        $ids = [];
        foreach($students_ids as $id){
            $ids[] = $id->user_id;
        }
        $t_pass_ids = [];
        foreach($ids as $id){
            $result = Exam::where('user_id', $id)->where('type', 'theory')->select('result')->first();
            if($result != null){
                if ($result->result == 'pass') {
                    $t_pass_ids[] = $id;
                }
            }
        }
        $students = Student::with('user')->whereIn('user_id', $t_pass_ids)->get();

        return response()->json($students);
    }

    public function getmanualstudents($category){
        $students_ids = StudentCategory::where('category', $category)->where('tstatus', 'Training')->get();

        $ids = [];
        foreach($students_ids as $id){
            $ids[] = $id->user_id;
        }
        $t_pass_ids = [];
        foreach($ids as $id){
            $result = Exam::where('user_id', $id)->where('type', 'theory')->select('result')->first();
            if($result != null){
                if ($result->result == 'pass') {
                    $t_pass_ids[] = $id;
                }
            }
        }
        $students = Student::with('user')->whereIn('user_id', $t_pass_ids)->get();

        return response()->json($students);
    }

    public function gettheorydays($count, $students){
        $students = explode(',',$students);
        $current = date('Y-m-d');
        $days = [];
        for ($i=1; $i <= $count ; $i++) {
            $child = [];
            $date = date('Y-m-d', strtotime("+$i day"));
            $child['date'] = $date;
            $child['ui_date'] = date('M-d', strtotime($date));
            $day_name = date('l', strtotime("+$i day", strtotime($current)));
            $child['name'] = $day_name;
            $havesession = 0;
            $result = 0;
            $child['have_ids'] = [];
            foreach($students as $std){
                $result = Shedule::whereHas('sheduledstudents', function($query) use($std){
                    $query->where('student_id', $std);
                })->where('date', $date)->where('shedule_status', 1 )->get();
                if($result->count() > 0){
                    $havesession += 1;
                    array_push($child['have_ids'], $std);
                }else{
                    array_push($child['have_ids'] ,0);
                }
            }
            $child['have_session'] = $havesession;
            if ($day_name == 'Monday') {
                $child['weekday_id'] = 1;
                $session_count = TimeSlots::where('weekday_id', 1)->where('exam_type', 'Theory')->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Tuesday'){
                $child['weekday_id'] = 2;
                $session_count = TimeSlots::where('weekday_id', 2)->where('exam_type', 'Theory')->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Wednesday'){
                $child['weekday_id'] = 3;
                $session_count = TimeSlots::where('weekday_id', 3)->where('exam_type', 'Theory')->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Thursday'){
                $child['weekday_id'] = 4;
                $session_count = TimeSlots::where('weekday_id', 4)->where('exam_type', 'Theory')->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Friday'){
                $child['weekday_id'] = 5;
                $session_count = TimeSlots::where('weekday_id', 5)->where('exam_type', 'Theory')->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Saturday'){
                $child['weekday_id'] = 6;
                $session_count = TimeSlots::where('weekday_id', 6)->where('exam_type', 'Theory')->count();
                $child['session_count'] = $session_count;
            }else{
                $child['weekday_id'] = 7;
                $session_count = TimeSlots::where('weekday_id', 7)->where('exam_type', 'Theory')->count();
                $child['session_count'] = $session_count;
            }
            array_push($days, $child);
        }
        return response()->json($days);
    }

    public function getonlymanualdays($count, $category, $students){
        $students = explode(',',$students);
        $current = date('Y-m-d');
        $days = [];
        for ($i=1; $i <= $count ; $i++) {
            $child = [];
            $date = date('Y-m-d', strtotime("+$i day"));
            $child['date'] = $date;
            $child['ui_date'] = date('M-d', strtotime($date));
            $day_name = date('l', strtotime("+$i day", strtotime($current)));
            $child['name'] = $day_name;
            $havesession = 0;
            $result = 0;
            $child['have_ids'] = [];
            foreach($students as $std){
                $result = Shedule::whereHas('sheduledstudents', function($query) use($std){
                    $query->where('student_id', $std);
                })->where('date', $date)->where('shedule_status', 1 )->get();
                if($result->count() > 0){
                    $havesession += 1;
                    array_push($child['have_ids'], $std);
                }else{
                    array_push($child['have_ids'] ,0);
                }
            }
            $child['have_session'] = $havesession;
            if ($day_name == 'Monday') {
                $child['weekday_id'] = 1;
                $session_count = TimeSlots::where('weekday_id', 1)->where('exam_type', 'Practical')->where('vehicle_category', $category)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Tuesday'){
                $child['weekday_id'] = 2;
                $session_count = TimeSlots::where('weekday_id', 2)->where('exam_type', 'Practical')->where('vehicle_category', $category)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Wednesday'){
                $child['weekday_id'] = 3;
                $session_count = TimeSlots::where('weekday_id', 3)->where('exam_type', 'Practical')->where('vehicle_category', $category)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Thursday'){
                $child['weekday_id'] = 4;
                $session_count = TimeSlots::where('weekday_id', 4)->where('exam_type', 'Practical')->where('vehicle_category', $category)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Friday'){
                $child['weekday_id'] = 5;
                $session_count = TimeSlots::where('weekday_id', 5)->where('exam_type', 'Practical')->where('vehicle_category', $category)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Saturday'){
                $child['weekday_id'] = 6;
                $session_count = TimeSlots::where('weekday_id', 6)->where('exam_type', 'Practical')->where('vehicle_category', $category)->count();
                $child['session_count'] = $session_count;
            }else{
                $child['weekday_id'] = 7;
                $session_count = TimeSlots::where('weekday_id', 7)->where('exam_type', 'Practical')->where('vehicle_category', $category)->count();
                $child['session_count'] = $session_count;
            }
            array_push($days, $child);
        }
        return response()->json($days);
    }

    public function getautomanualdays($count, $category, $trans, $students){
        $students = explode(',',$students);
        $current = date('Y-m-d');
        $days = [];
        for ($i=1; $i <= $count ; $i++) {
            $child = [];
            $date = date('Y-m-d', strtotime("+$i day"));
            $child['date'] = $date;
            $child['ui_date'] = date('M-d', strtotime($date));
            $day_name = date('l', strtotime("+$i day", strtotime($current)));
            $child['name'] = $day_name;
            $havesession = 0;
            $result = 0;
            $child['have_ids'] = [];
            foreach($students as $std){
                $result = Shedule::whereHas('sheduledstudents', function($query) use($std){
                    $query->where('student_id', $std);
                })->where('date', $date)->where('shedule_status', 1 )->get();
                if($result->count() > 0){
                    $havesession += 1;
                    array_push($child['have_ids'], $std);
                }else{
                    array_push($child['have_ids'] ,0);
                }
            }
            $child['have_session'] = $havesession;
            if ($day_name == 'Monday') {
                $child['weekday_id'] = 1;
                $session_count = TimeSlots::where('weekday_id', 1)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Tuesday'){
                $child['weekday_id'] = 2;
                $session_count = TimeSlots::where('weekday_id', 2)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Wednesday'){
                $child['weekday_id'] = 3;
                $session_count = TimeSlots::where('weekday_id', 3)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Thursday'){
                $child['weekday_id'] = 4;
                $session_count = TimeSlots::where('weekday_id', 4)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Friday'){
                $child['weekday_id'] = 5;
                $session_count = TimeSlots::where('weekday_id', 5)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->count();
                $child['session_count'] = $session_count;
            }elseif($day_name == 'Saturday'){
                $child['weekday_id'] = 6;
                $session_count = TimeSlots::where('weekday_id', 6)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->count();
                $child['session_count'] = $session_count;
            }else{
                $child['weekday_id'] = 7;
                $session_count = TimeSlots::where('weekday_id', 7)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->count();
                $child['session_count'] = $session_count;
            }
            array_push($days, $child);
        }
        return response()->json($days);
    }

    public function gettheorysessionins($day){
        $day_name = date('l', strtotime($day));
        $day_id = 0;
        if($day_name == 'Monday'){
            $day_id = 1;
        }
        else if($day_name == 'Tuesday'){
            $day_id = 2;
        }
        else if($day_name == 'Wednesday'){
            $day_id = 3;
        }
        else if($day_name == 'Thursday'){
            $day_id = 4;
        }
        else if($day_name == 'Friday'){
            $day_id = 5;
        }
        else if($day_name == 'Saturday'){
            $day_id = 6;
        }
        else{
            $day_id = 7;
        }
        $results = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $day_id)->where('exam_type', 'Theory')->get();
        return response()->json($results);
    }

    public function getmanualsessionins($day, $category){
        $day_name = date('l', strtotime($day));
        $day_id = 0;
        if($day_name == 'Monday'){
            $day_id = 1;
        }
        else if($day_name == 'Tuesday'){
            $day_id = 2;
        }
        else if($day_name == 'Wednesday'){
            $day_id = 3;
        }
        else if($day_name == 'Thursday'){
            $day_id = 4;
        }
        else if($day_name == 'Friday'){
            $day_id = 5;
        }
        else if($day_name == 'Saturday'){
            $day_id = 6;
        }
        else{
            $day_id = 7;
        }
        $results = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $day_id)->where('exam_type', 'Practical')->where('vehicle_category', $category)->get();
        return response()->json($results);
    }

    public function getautomanualsessionsins($day, $category, $trans){
        $day_name = date('l', strtotime($day));
        $day_id = 0;
        if($day_name == 'Monday'){
            $day_id = 1;
        }
        else if($day_name == 'Tuesday'){
            $day_id = 2;
        }
        else if($day_name == 'Wednesday'){
            $day_id = 3;
        }
        else if($day_name == 'Thursday'){
            $day_id = 4;
        }
        else if($day_name == 'Friday'){
            $day_id = 5;
        }
        else if($day_name == 'Saturday'){
            $day_id = 6;
        }
        else{
            $day_id = 7;
        }
        $results = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $day_id)->where('exam_type', 'Practical')->where('vehicle_category', $category)->where('transmission', $trans)->get();
        return response()->json($results);
    }

    public function othersessions($date){
        $othersessions = Shedule::where('date', $date)->where('shedule_status', 1)->withcount('SheduledStudents')->whereHas('SheduledStudents')->get();
        return response()->json($othersessions);
    }

    public function getcustometime($date){

        $absent_ids = [];
        // check single day leaves
        $single_leave_days = EmplooyeeLeave::where('start_date', $date)->where('status', 1)->get();
        if(count($single_leave_days) > 0){
            foreach ($single_leave_days as $leave) {
                $absent_ids[] = $leave->user_id;
            }
        }
        // check more leave days
        $more_leave_days = EmplooyeeLeave::where('start_date', '<', $date)->where('end_date', '>=', $date)->where('status', 1)->get();
        if (count($more_leave_days) > 0) {
            foreach ($more_leave_days as $leave) {
                $absent_ids[] = $leave->user_id;
            }
        }

        $instructors = Instructor::with(['user', 'shedules' => function($query) use($date){
            $query->where('date', $date);
        }])->get();
        $result = [];
        foreach($instructors as $ins){
            $child = [];
            $child['user_id'] = $ins->user_id;
            $shedules = [];
            if(count($ins->shedules) > 0){
                foreach($ins->shedules as $shedule){
                    $shedules[] = $shedule->time;
                }
            }
            $child['working_times'] = $shedules;
            if(in_array($ins->user_id, $absent_ids)){
                $child['status'] = 0;
            }else{
                $child['status'] = 1;
            }
            array_push($result, $child);
        }
        return response()->json($result);
    }

    public function confirmlaststep(Request $request){
        $session_type = $request->session_type;
        $date = $request->date;
        $transmission = 'none';
        $category = 'none';
        if($session_type == 'practicle'){
            $transmission = $request->transmission;
            $category = $request->category[0];
        }
        $type = $request->type;
        if($type == 'defined'){
            $time = $request->timeslots;
            $ins = "instructor-".$time;
            $instructor = $request->$ins;
        }
        if($type == 'custome'){
            $time = $request->custome_time;
            $instructor = $request->custome_instructors;
        }
        $title = $request->title;
        if(!$title){
            $count = Shedule::count();
            $title = 'Session '.($count + 1);
        }

        $shedule = Shedule::create([
            'title' => $title,
            'date' => $date,
            'time' => $time,
            'lesson_type' => $session_type,
            'instructor' => $instructor,
            'vahicle_category' => $category,
            'transmission' => $transmission,
            'shedule_status' => 1,
        ]);

        $students = $request->students;
        foreach ($students as $std) {
            SheduledStudents::create([
                'shedule_id' => $shedule->id,
                'student_id' => $std,
            ]);
        }

        $insalert = "You have to instruct a new $session_type on $date at $time";
        $stdalert = "You have to participate a new $session_type on $date at $time";

        $insalertmsg = SheduleAlert::create([
            'shedule_id' => $shedule->id,
            'message' => $insalert,
        ]);
        AlertForStudent::create([
            'shedulealert_id' => $insalertmsg->id,
            'student_id' => $instructor,
            'alert_status' => 0,
        ]);

        $stdalertmsg = SheduleAlert::create([
            'shedule_id' => $shedule->id,
            'message' => $stdalert,
        ]);
        foreach ($students as $std) {
            AlertForStudent::create([
                'shedulealert_id' => $stdalertmsg->id,
                'student_id' => $std,
                'alert_status' => 0,
            ]);
            Attendance::create([
                'shedule_id' => $shedule->id,
                'user_id' => $std,
                'attendance' => 2
            ]);
        }

        return redirect()->route('owneraddschedule')->with('successmsg', 'Schedule added successfully !!');
    }

    // edit schedule function
    public function ownereditschedule($shedule_id){
        $shedule = Shedule::with('sheduledstudents')->where('id', $shedule_id)->get();
        $categories = VehicleCategory::all();
        $instructor = Instructor::with('user')->get();
        $students = Student::with('user')->get();
        return view('owner.sheduling.editschedule', compact('shedule', 'categories', 'instructor', 'students'));
    }

    public function removestudents($student_list, $shedule_id){
        // return $shedule_id;
        $students = explode(',',$student_list);
        $ids = [];
        $attendids = [];
        foreach($students as $std){
            $result = SheduledStudents::where('shedule_id' , $shedule_id)->where('student_id', $std)->get();
            $attendres = Attendance::where('shedule_id', $shedule_id)->where('user_id', $std)->get();
            foreach($result as $res){
                $ids[] = $res->id;
            }
            foreach($attendres as $res){
                $attendids[] = $res->id;
            }
        }
        $message = "You Removed from Session $shedule_id";
        $removealert = SheduleAlert::create([
            'shedule_id' => $shedule_id,
            'message' => $message,
        ]);
        foreach($ids as $id){
            SheduledStudents::find($id)->delete();
            AlertForStudent::create([
                'shedulealert_id' => $removealert->id,
                'student_id' => $id,
                'alert_status' => 0
            ]);
        }
        foreach($attendids as $id){
            Attendance::find($id)->delete();
        }
        return response()->json(['message' => 'Student Remove Successfully !!']);
    }

    public function getsheduledstudents($shedule_id){
        $result = SheduledStudents::where('shedule_id', $shedule_id)->get();
        return response()->json($result);
    }

    public function changeInstructor($ins, $shedule_id){
        $shedule = Shedule::find($shedule_id);
        $shedule->instructor = $ins;
        $shedule->save();

        $result = Shedule::where('id', $shedule_id)->first();
        $message = "You Have to Instruct a $result->lesson_type Session on $result->date at $result->time";
        $insalert = SheduleAlert::create([
            'shedule_id' => $shedule_id,
            'message' => $message,
        ]);

        AlertForStudent::create([
            'shedulealert_id' => $insalert->id,
            'student_id' => $ins,
            'alert_status' => 0
        ]);
        return response()->json(['message' => 'Instructor Change Succesfully ']);
    }
}
