<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
use App\SheduleAlert;
use App\AlertForStudent;
use App\Attendance;
use App\CompanyDetails;
use App\EmplooyeeLeave;
use App\EmployeeAttendances;
use App\Http\Requests\CreateScheduleRequest;
use App\SheduledStudents;
use App\SheduleRequest;
use App\ShedulingType;
use App\Student;
use App\TimeSlots;
use App\TimeTable;
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

    // public $date;
    // public $time;
    // public $choosedins;
    // public $instructors;
    // public $students;

    // public function setdate($date){
    //     $this->date = $date;
    // }

    // public function getdate(){
    //     return $this->date;
    // }

    public function index(){

        $prevhour = date('H') - 1;
        $currenthour = date('H');

        $date_month = Carbon::now()->subDays(30);
        $date_last_month = Carbon::now()->subDays(60);
        $date_six_month = Carbon::now()->subDays(180);
        $date_year = Carbon::now()->subDays(365);
        $current = Carbon::today();
        $endDate = Carbon::today()->addDays(7);

        $shedules = OwnerShedule::where('shedule_status', '=', 1)->with('SheduledStudents')->get();

        // next seven days
        $next_shedules = OwnerShedule::whereBetween('date', [$current, $endDate])->where('shedule_status', '=', 1)->get();

        // allshedules
        $totalshedules = OwnerShedule::count();

        // today shedules
        $today_shedules = OwnerShedule::where('date', $current)->count();

        // total shedule for statistics
        $totalshedules_month = OwnerShedule::whereBetween('date', [$date_month, $current])->get();
        $totalshedules_lastmonth = OwnerShedule::whereBetween('date', [$date_last_month, $date_month])->get();
        $totalshedules_sixmonth = OwnerShedule::whereBetween('date',  [$date_six_month, $current])->get();
        $totalshedules_year = OwnerShedule::whereBetween('date', [$date_year, $current])->get();

        // complete shedules for statistics
        $complateshedules_month = OwnerShedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 2)->get();
        $complateshedules_lastmonth = OwnerShedule::whereBetween('date', [$date_last_month, $date_month])->where('shedule_status', '=', 2)->get();
        $complateshedules_sixmonth = OwnerShedule::whereBetween('date', [$date_six_month, $current])->where('shedule_status', '=', 2)->get();
        $complateshedules_year = OwnerShedule::whereBetween('date', [$date_year, $current])->where('shedule_status', '=', 2)->get();

        // cancel shedules for statistics
        $canceledshedules_month = OwnerShedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 3)->get();
        $canceledshedules_lastmonth = OwnerShedule::whereBetween('date', [$date_last_month, $date_month])->where('shedule_status', '=', 3)->get();
        $canceledshedules_sixmonth = OwnerShedule::whereBetween('date', [$date_six_month, $current])->where('shedule_status', '=', 3)->get();
        $canceledshedules_year = OwnerShedule::whereBetween('date', [$date_year, $current])->where('shedule_status', '=', 3)->get();

        // uncomplete shedules for statistics
        $uncompleteshedules_month = OwnerShedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 4)->get();
        $uncompleteshedules_lastmonth = OwnerShedule::whereBetween('date', [$date_last_month, $date_month])->where('date', '>=', $date_month)->where('shedule_status', '=', 4)->get();
        $uncompleteshedules_sixmonth = OwnerShedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 4)->get();
        $uncompleteshedules_year = OwnerShedule::whereBetween('date', [$date_month, $current])->where('shedule_status', '=', 4)->get();

        return view('owner.sheduling.shedulelist', compact('shedules','totalshedules', 'today_shedules', 'totalshedules_month', 'totalshedules_lastmonth', 'next_shedules','totalshedules_sixmonth', 'totalshedules_year','complateshedules_month','complateshedules_lastmonth', 'complateshedules_sixmonth', 'complateshedules_year', 'canceledshedules_month','canceledshedules_lastmonth', 'canceledshedules_sixmonth','canceledshedules_year', 'uncompleteshedules_month', 'uncompleteshedules_lastmonth', 'uncompleteshedules_sixmonth', 'uncompleteshedules_year'));
        // return $today_shedules;
    }

    public function addschedule(){
        $shedulingtype = ShedulingType::select('type')->first();
        $type = $shedulingtype->type;
        return view('owner.sheduling.addshedule', compact('type'));
    }

    public function allevents(){
        $setone = OwnerShedule::whereHas('sheduledstudents')->get();
        $settwo = SheduleRequest::with('ownershedules')->whereIn('shedule_status', [0, 2])->get();
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
                $row['title'] = $two->ownershedules->title;
                $row['color'] = '#0FD8F3';
                $row['textColor'] = '#040124';
                $row['date'] = $two->ownershedules->date;
                array_push($responses, $row);
            }elseif ($two->shedule_status == 2) {
                $row['title'] = $two->ownershedules->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $two->ownershedules->date;
                array_push($responses, $row);
            }
        }
        return response()->json($responses);
    }

    // ====================================== ADD NEW PART ===========================
    public function checkinputdate($date){

        $today = Carbon::now()->today();
        $start = strtotime($today);
        $end = strtotime($date);
        $daydiff = ($end - $start)/60/60/24;
        $selectdayname = date('l', strtotime($date));

        // chack day difference with selected date
        if($daydiff <= 0){
            return back()->with('errormsg', 'Cannot add Shedule for previous Day !!');
        }

        // absent instructors id list
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

        $leaves = collect($absent_ids);
        $presentinstructors = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }, 'ownershedules' => function($query) use($date){
            $query->where('date', $date);
        }])->whereNotIn('user_id', $leaves)->get();

        if(count($presentinstructors) == 0){
            return back()->with('errormsg', 'All Instructors are Leave on today !!');
        }

        // check student availability
        $students_id = OwnerShedule::with('sheduledstudents')->where('date', $date)->get();
        $studentwithshedule = [];
        foreach ($students_id as $key => $value) {
            foreach ($value->sheduledstudents as $id) {
                $studentwithshedule[] = $id->student_id;
            }
        }
        $havesheduled = collect($studentwithshedule);
        if (count($studentwithshedule) > 0) {
            $filterstudents = Student::with(['user', 'attendances'])->whereNotIn('user_id', $havesheduled)->whereHas('user', function($query){
                $query->where('status', 1);
            })->get();
            if (count($filterstudents) == 0) {
                return back()->with('errormsg', 'Cannot add new shedule on this day becouse of all student have session on this day !!');
            }else{
                $presentstudents = $filterstudents;
            }
        }else{
            $presentstudents = Student::with(['user','attendances'])->whereHas('user', function($query){
                $query->where('status', 1);
            })->get();
        }

        // get weekday id
        $timeslot = WeekDay::where('day_name', $selectdayname)->select('id')->first();
        $dayid = $timeslot->id;

        //get defined timeslots with instructors
        $timeslots = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $dayid)->get();

        // get selected date shedules with students count
        $shedules = OwnerShedule::where('date', $date)->withcount('SheduledStudents')->whereHas('SheduledStudents')->get();
        $instructors = Instructor::with(['user', 'ownershedules' => function($query) use($date){
            $query->where('date', $date);
        }])->get();
        return view('owner.sheduling.processsheduletime', compact('date', 'timeslots', 'shedules', 'selectdayname', 'instructors', 'absent_ids'));
    }

    public function checkinputtimeslot(Request $request){
        $date = $request->date;
        if ($request->has('slotdivider')) {
            $custometime = $request->custometime;
            $customeinstructor = $request->customeinstructor;
            if($custometime == ''){
                return back()->with('errormessage', 'If you want Custome time slot, Please Enter a time !!');
            }
            if(empty($customeinstructor)){
                return back()->with('errormessage', 'If you want Custome time slot, Please choose an instructor !!');
            }
            $time = $custometime;
            $instructor = $customeinstructor[0];
        }else{
            $deffslot = $request->slottime;
            if(empty($deffslot)){
                return back()->with('errormessage', 'You have to choose available or custome time slot !!');
            }
            $value = $deffslot[0].'-select';
            $deffinstructor = $request->$value;
            if(empty($deffinstructor)){
                return back()->with('errormessage', 'Please choose relevent Instructor !!');
            }
            $time = $deffslot[0];
            $instructor = $deffinstructor[0];
        }

        // instructors details
        $instructors = Instructor::with('user')->get();

        // get free students
        $havesessions = OwnerShedule::with('sheduledstudents')->whereHas('sheduledstudents')->where('date', $date)->get();
        $havesessionids = [];
        foreach($havesessions as $session){
            foreach ($session->sheduledstudents as $student) {
                $havesessionids[] = $student->student_id;
            }
        }
        $filterids = collect($havesessionids);
        $students = Student::with('user')->whereNotIn('user_id', $filterids)->get();
        // return $students;
        return view('owner.sheduling.precesscreateshedule', compact('date', 'time', 'instructor', 'instructors', 'students'));
    }

    public function createschedule(CreateScheduleRequest $request){
        $date = $request->date;
        $time = $request->time;
        $instructor = $request->instructor;
        $session_name = $request->session_name;
        $session_type = $request->session_type;
        $students = $request->students;

        $schedule = OwnerShedule::create([
            'title' => $session_name,
            'date' => $date,
            'color' => '#040124',
            'textColor' => '#35FF35',
            'time' => $time,
            'lesson_type' => $session_type,
            'instructor' => $instructor,
            'shedule_status' => 1,
        ]);

        foreach ($students as $student) {
            SheduledStudents::create([
                'shedule_id' => $schedule->id,
                'student_id' => $student
            ]);
        }

        // alert for students
        $studentmessage = "You Have to Participate to a new $session_type Session on $date at $time.";
        $studentalert = SheduleAlert::create([
            'shedule_id' => $schedule->id,
            'message' => $studentmessage
        ]);
        foreach ($students as $student) {
            AlertForStudent::create([
                'shedulealert_id' => $studentalert->id,
                'student_id' => $student,
                'alert_status' => 0
            ]);
        }

        //alert for instructor
        $instructormessage = "You Have to Instruct to a new $session_type Session on $date at $time.";
        $instructoralert = SheduleAlert::create([
            'shedule_id' => $schedule->id,
            'message' => $instructormessage
        ]);
        foreach ($students as $student) {
            AlertForStudent::create([
                'shedulealert_id' => $instructoralert->id,
                'student_id' => $student,
                'alert_status' => 0
            ]);
        }

        return redirect('/');
    }

    public function reupdateshedule($id, $date){
        $instructors = Instructor::with('user')->get();
        $shedules = OwnerShedule::where('id', $id)->withCount('sheduledstudents')->get();

        // get free sudents
        $havesessions = OwnerShedule::with('sheduledstudents')->whereHas('sheduledstudents')->where('date', $date)->get();
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
        }

        return redirect()->route('calendar')->with('successmsg', 'Shedule Updated Successfully !!');
    }
    // ====================================== END SECTION ============================

    public function viewdetails($id){
        $result = OwnerShedule::where('id',$id)->with('SheduledStudents')->get();

        $check = OwnerShedule::whereHas('shedulerequests', function($query) use($id){
            $query->where('shedule_id', $id);
        })->count();
        // return $check;
        if($check > 0){
            $shedule = SheduleRequest::with('ownershedules')->where('shedule_id', $id)->get();
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
        $shedules = OwnerShedule::orderBy('date', 'DESC')->get();
        return view('owner.sheduling.allshedules', compact('shedules'));
    }

    //cancel shedule
    public function cancel($id){
        $shedule = OwnerShedule::where('id', $id)->get();
        return view('owner.sheduling.cancelshedule', compact('shedule'));
    }

    public function updateascancel(Request $request){
        $this->validate($request, [
            'reson' => 'required|min:30',
        ]);

        $id = $request->id;

        $cancel = OwnerShedule::find($id);
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

        return redirect()->route('ownershedulelist')->with('successmsg', 'Sheduled cancel Successfully !! ');

    }

    public function todayshedules(){
        $current = Carbon::today();
        $today_shedules = OwnerShedule::where('date', $current)->get();
        return view('owner.sheduling.todayshedules', compact('today_shedules'));
    }


    // complate shedule
    public function markascomplete($id){

        $shedule = OwnerShedule::where('id', $id)->with('SheduledStudents')->get();
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
                $owner_shedule = OwnerShedule::find($shedule_id);
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

}
