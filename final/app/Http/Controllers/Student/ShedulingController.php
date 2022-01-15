<?php

namespace App\Http\Controllers\Student;

use App\AlertForStudent;
use App\EmplooyeeLeave;
use App\Exam;
use App\ExpandRequests;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\shedule;
use App\RequestAlert;
use App\RequestCategories;
use App\SheduleAlert;
use App\SheduledStudents;
use App\SheduleRequest;
use App\ShedulingType;
use App\Student;
use App\StudentCategory;
use App\TimeSlots;
use App\VehicleCategory;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $today = Carbon::now()->today();
        $user_id = Auth::user()->id;

        // check sheduling method
        $today_sessions = Shedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->where('date', $today)->whereIn('shedule_status', [1, 2])->get();

        // calculate grogess
        $completed_session = Student::select('completed_session')->where('user_id', $user_id)->first();
        $total_session =  Student::where('user_id', $user_id)->select('total_session')->first();
        $comp = $completed_session->completed_session;
        $tot = $total_session->total_session;

        $progress = ( $comp / $tot) * (100);

        $requestdetails = ExpandRequests::with('requestcategories')->where('user_id', $user_id)->where('status', 0)->get();
        $categorydetails = VehicleCategory::all();

        //check sheduling type
        $sheduling_type = ShedulingType::first();
        $type = $sheduling_type->type;

        //instructor details
        $instructor = Instructor::with('user')->get();
        // return $today_sessions;

        return view('student.sheduling.sheduling', compact('today_sessions', 'progress', 'total_session', 'completed_session', 'requestdetails', 'categorydetails', 'type', 'comp', 'instructor'));
    }

    public function events($id){

        $setone = SheduledStudents::with('shedule')->where('student_id', $id)->get();
        $settwo = SheduleRequest::with('shedules')->where('user_id', $id)->get();
        $setthree = Exam::where('user_id',$id)->get();

        $responses = [];
        foreach($setone as $one){
            $row = [];
            if ($one->shedule->shedule_status == 1) {
                $row['title'] = $one->shedule->title;
                $row['color'] = '#35FF35';
                $row['textColor'] = '#040124';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }elseif ($one->shedule->shedule_status == 2) {
                $row['title'] = $one->shedule->title;
                $row['color'] = '#03011F';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }elseif ($one->shedule->shedule_status == 3) {
                $row['title'] = $one->shedule->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }else{
                $row['title'] = $one->shedule->title;
                $row['color'] = '#FF891A';
                $row['textColor'] = '#040124';
                $row['date'] = $one->shedule->date;
                array_push($responses, $row);
            }
        }
        foreach ($settwo as $two) {
            $row = [];
            if ($two->shedule_status == 0) {
                $row['title'] = $two->shedules->title;
                $row['color'] = '#0FD8F3';
                $row['textColor'] = '#040124';
                $row['date'] = $two->shedules->date;
                array_push($responses, $row);
            }elseif ($two->shedule_status == 2) {
                $row['title'] = $two->shedules->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $two->shedules->date;
                array_push($responses, $row);
            }
        }
        foreach($setthree as $three){
            $row = [];
            if($three->result == 'pass' && $three->type == 'theory'){
                $row['title'] = 'Theory Exam';
                $row['color'] = '#5BB85C';
                $row['textColor'] = '#FFF';
                $row['date'] = $three->date;
                array_push($responses, $row);
            }
            elseif($three->result == 'pass' && $three->type == 'practical'){
                $row['title'] = 'Practical Exam';
                $row['color'] = '#5BB85C';
                $row['textColor'] = '#FFF';
                $row['date'] = $three->date;
                array_push($responses, $row);
            }
            elseif($three->result == 'none' && $three->type == 'practical'){
                $row['title'] = 'Practical Exam';
                $row['color'] = '#1A57ED';
                $row['textColor'] = '#FFF';
                $row['date'] = $three->date;
                array_push($responses, $row);
            }
            elseif($three->result == 'none' && $three->type == 'theory'){
                $row['title'] = 'Theory Exam';
                $row['color'] = '#1A57ED';
                $row['textColor'] = '#FFF';
                $row['date'] = $three->date;
                array_push($responses, $row);
            }
            elseif($three->result == 'fail' && $three->type == 'theory'){
                $row['title'] = 'Theory Exam';
                $row['color'] = '#F01E1E';
                $row['textColor'] = '#FFF';
                $row['date'] = $three->date;
                array_push($responses, $row);
            }
            elseif($three->result == 'fail' && $three->type == 'practical'){
                $row['title'] = 'Practical Exam';
                $row['color'] = '#F01E1E';
                $row['textColor'] = '#FFF';
                $row['date'] = $three->date;
                array_push($responses, $row);
            }
        }
        return response()->json($responses);
    }

    public function checkdate($date, $category){

        $today = Carbon::now()->today();
        $user_id = Auth::user()->id;
        $total_session = Student::where('user_id', Auth::user()->id)->select('total_session')->first();
        $completed_session = Student::where('user_id', Auth::user()->id)->select('completed_session')->first();

        if (($date <= $today) || ($category == "empty") ) {
            return back()->with('errormsg', 'Something went wrong. Please Check your selected date or choosed category !!');
        }else{

            if ($total_session->total_session <= $completed_session->completed_session) {
                return back()->with('errormsg', 'You have already completed your total sessions !!');
            }else{

                $select_dateshedules = SheduledStudents::where('student_id', $user_id)->whereHas('shedule', function($query) use($date){
                    $query->where('date', $date);
                })->count();
                // return $select_dateshedules;
                if ($select_dateshedules > 0) {
                    return back()->with('errormsg', 'You Already have session on this day !!');
                }

                //all instructors
                $instructors = Instructor::with('user')->get();

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

                $instructor_count = $instructors->count();
                if($instructor_count == count($absent_ids)){
                    return back()->with('errormsg', 'All Instructors are Leave today !!');
                }

                // selected date details
                $select_date = $date;

                // collecting selected date session
                $dayschedules = Shedule::where('date', $select_date)->whereHas('sheduledstudents')->withCount('sheduledstudents')->get();

                $day_name = date('l', strtotime($select_date));
                $weekday_id = 0;

                if ($day_name == 'Monday') {
                    $weekday_id = 1;
                }elseif ($day_name == 'Tuesday') {
                    $weekday_id = 2;
                }elseif ($day_name == 'Wednesday') {
                    $weekday_id = 3;
                }elseif ($day_name == 'Thursday') {
                    $weekday_id = 4;
                }elseif ($day_name == 'Friday') {
                    $weekday_id = 5;
                }elseif ($day_name == 'Saturday') {
                    $weekday_id = 6;
                }else{
                    $weekday_id = 7;
                }

                // get exam results
                $theorysession = Exam::where('user_id', $user_id)->where('type', 'theory')->select('result')->first();
                $tresult = $theorysession->result;
                if($tresult == 'fail'){
                    $theorysessions = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $weekday_id)->where('exam_type', 'theory')->get();
                    if($theorysessions->count() == 0){
                        return back()->with('errormsg', "No theory session on $day_name. Please Select another date !!");
                    }else{
                        $time_table = $theorysessions;
                        $session_type = 'theory';
                    }
                }
                if($tresult == 'pass'){
                    $practiclesessions = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $weekday_id)->where('exam_type', 'Practical')->get();
                    if($practiclesessions->count() == 0){
                        return back()->with('errormsg', "No practicle session on $day_name. Please Select another date !!");
                    }else{
                        $time_table = $practiclesessions;
                        $session_type = 'practicle';
                    }
                }

                // get categories
                $trainingcategories = StudentCategory::where('user_id', $user_id)->get();
                $categories = VehicleCategory::all();
                $availableSlots = TimeSlots::where('weekday_id', $weekday_id)->get();

                return view('student.sheduling.settimeslot', compact('time_table', 'select_date', 'instructors', 'tresult', 'absent_ids', 'dayschedules', 'session_type', 'trainingcategories', 'categories', 'weekday_id'));

            }

        }

    }

    public function requestslot(Request $request){

        $date = $request->date;
        $lesson_type = $request->lesson_type;
        $timeslot_id = $request->timeslot;
        $category = $request->category;

        $val = $timeslot_id.'-instructor_id';
        $instructor = $request->$val;

        if($category == 'select'){
            return back()->with('errormsg', 'Select a vehicle category !!');
        }

        if ($timeslot_id == '') {
            return back()->with('errormsg', 'Select a session time !!');
        }else{
            $slots = TimeSlots::where('id', $timeslot_id)->select('time_slot')->first();
            $slot_time = $slots->time_slot;
        }

        if($instructor == ''){
            return back()->with('errormsg', 'Choose an Instructor !!');
        }

        $transmission = StudentCategory::where('user_id', Auth::user()->id)->where('category', $category)->select('transmission')->first();
        $trans = $transmission->transmission;

        $check = Shedule::where('date', $date)->where('time', $slot_time)->where('instructor', $instructor)->where('vahicle_category', $category[0])->where('transmission', $trans)->first();
        if(empty($check)){
            $shedule = Shedule::create([
                'title' => 'session request',
                'date' => $date,
                'time' => $slot_time,
                'lesson_type' => $lesson_type,
                'instructor' => $instructor,
                'vahicle_category' => $category[0],
                'transmission' => $trans,
                'shedule_status' => 1,
            ]);
            $shedulerequest = SheduleRequest::create([
                'shedule_id' => $shedule->id,
                'user_id' => Auth::user()->id,
                'status' => 0,
                'shedule_status' => 0
            ]);
        }else{
            $shedulerequest = SheduleRequest::create([
                'shedule_id' => $check->id,
                'user_id' => Auth::user()->id,
                'status' => 0,
                'shedule_status' => 0
            ]);
        }

        return redirect()->route('studentsheduling')->with('succesmsg', 'Your Session request successfully send !!');
    }

    public function completedshedules(){
        $user_id = Auth::user()->id;
        $shedules = Shedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->where('shedule_status', 2)->get();
        $categories = VehicleCategory::all();
        $instructors = Instructor::with('user')->get();
        return view('student.sheduling.progressdetails', compact('shedules', 'categories', 'instructors'));
    }

    public function pendingrequest(){
        $user_id = Auth::user()->id;
        $shedules = SheduleRequest::with('shedules')->where('status', 0)->where('user_id', $user_id)->get();
        $categories = VehicleCategory::all();
        $instructors = Instructor::with('user')->get();
        return view('student.sheduling.pendingrequest', compact('shedules', 'categories','instructors'));
    }

    public function expandrinequest(){
        $user_id = Auth::user()->id;
        $trainingDetails = StudentCategory::where('user_id', $user_id)->get();
        $category_names = VehicleCategory::all();
        $values = [];
        $unselect_category = [];
        foreach ($trainingDetails as $category) {
            foreach ($category_names as $name) {
                if ($category->category == $name->category_code) {
                    $array = [];
                    $array['category_code'] = $category->category;
                    $array['category_name'] = $name->name;
                    $array['training_type'] = $category->tstatus;
                    $array['transmission'] = $category->transmission;
                    array_push($values, $array);
                }else{
                    $array = [];
                    $array['category_code'] = $category->category;
                    $array['category_name'] = $name->name;
                    array_push($unselect_category, $array);
                }
            }
        }
        return view('student.sheduling.expandrequest', compact('values', 'unselect_category'));
    }

    public function requestmore(Request $request){

        $requestcount = ExpandRequests::where('user_id', Auth::user()->id)->where('status', 0)->count();

        if ($requestcount > 0) {
            return back()->with('errormsg', 'Your previous request is already in a queue Please wait to confirm it by owner.');
        }

        $this->validate($request, [
            'number' => 'required',
        ]);

        $categories = $request->categories;
        if (empty($categories)) {
            return back()->with('errormsg', 'Please Select Vahicle of you hope to training more !!');
        }

        $exrequest = ExpandRequests::create([
            'user_id' => Auth::user()->id,
            'number' => $request->number,
            'status' => 0
        ]);

        foreach ($categories as $category) {
            $cat = RequestCategories::create([
                'request_id' => $exrequest->id,
                'category_code' => $category,
            ]);
        }

        return redirect()->route('studentsheduling')->with('succesmsg', 'Request Successfully send, Check on your pending request tab ');
    }

    public function deleterequests($id){
        $expandrequest = ExpandRequests::find($id);
        $expandrequest->delete();
        return redirect()->route('studentsheduling')->with('succesmsg', 'Request Successfully Removed !!');
    }

    public function history(){
        $user_id = Auth::user()->id;
        $history = SheduledStudents::where('student_id', $user_id)->whereHas('shedule', function($query){
            $query->whereNotIn('shedule_status', [1]);
        })->orderBy('created_at', 'DESC')->get();
        $instructors = Instructor::with('user')->get();
        $categories = VehicleCategory::all();
        return view('student.sheduling.history', compact('history', 'instructors', 'categories'));
    }

    public function rejected(){
        $user_id = Auth::user()->id;
        $rejectedlists = SheduleRequest::with('shedules')->where('user_id', $user_id)->where('shedule_status', 2)->get();
        $instructors = Instructor::with('user')->get();
        $categories = VehicleCategory::all();
        return view('student.sheduling.rejected', compact('rejectedlists', 'instructors', 'categories'));
    }

    public function getinstructordetails($category, $id){
        $user_id = Auth::user()->id;
        $transmission = StudentCategory::where('user_id', $user_id)->where('category', $category)->select('transmission')->first();
        $trans = $transmission->transmission;
        $results = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $id)->where('vehicle_category', $category)->where('transmission', $trans)->get();
        // return $results;
        return response()->json($results);
    }

    public function upcomingsessions(){
        $user_id = Auth::user()->id;
        $schedules = shedule::where('shedule_status', 1)->whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->get();
        $instructors = Instructor::with('user')->get();
        $categories = VehicleCategory::all();
        return view('student.sheduling.upcoming', compact('schedules', 'instructors', 'categories'));
    }

    public function requestnewsession(){
        $user_id = Auth::user()->id;
        $tcategories = StudentCategory::where('user_id', $user_id)->get();
        $categories = VehicleCategory::all();
        $tresult = Exam::select('result')->where('user_id', $user_id)->where('type', 'theory')->orderBy('attempt', 'DESC')->get();
        $res = $tresult[0]->result;
        return view('student.sheduling.requestsession', compact('categories', 'tcategories', 'res'));
    }

    public function getavailabledates($cat){
        $user_id = Auth::user()->id;
        $trainingDetails = StudentCategory::where('user_id', $user_id)->where('category', $cat)->select('transmission')->first();
        $trans = $trainingDetails->transmission;
        $dates = TimeSlots::where('vehicle_category', $cat)->where('transmission', $trans)->select('weekday_id')->get();
        $weekdayIDs = [];
        foreach($dates as $date){
            $weekdayIDs[] = $date->weekday_id;
        }
        $weekDays = [
            '7' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thursday',
            '5' => 'Friday',
            '6' => 'Saturday'
        ];
        $weekDaynames = [];
        foreach($weekDays as $id => $value){
            if (in_array($id, $weekdayIDs)) {
                $weekDaynames[] = $value;
            }
        }
        $startdate = Carbon::now()->addDays(1);
        $enddate = Carbon::now()->addDays(30);
        $allDates = CarbonPeriod::create($startdate, $enddate);
        $availableDates = [];
        foreach ($allDates as $date) {
            $row = [];
            if(in_array(date('l', strtotime($date)), $weekDaynames)){
                $row['title'] = 'Available';
                $row['color'] = '#35FF35';
                $row['date'] = $date;
            }
            array_push($availableDates, $row);
        }
        return response()->json($availableDates);
    }

    public function gettheorysessions(){
        $dates = TimeSlots::where('exam_type', 'theory')->get();
        $weekdayIDs = [];
        foreach($dates as $date){
            $weekdayIDs[] = $date->weekday_id;
        }
        $weekDays = [
            '7' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thursday',
            '5' => 'Friday',
            '6' => 'Saturday'
        ];
        $weekDaynames = [];
        foreach($weekDays as $id => $value){
            if (in_array($id, $weekdayIDs)) {
                $weekDaynames[] = $value;
            }
        }
        $startdate = Carbon::now()->addDays(1);
        $enddate = Carbon::now()->addDays(30);
        $allDates = CarbonPeriod::create($startdate, $enddate);
        $availableDates = [];
        foreach ($allDates as $date) {
            $row = [];
            if(in_array(date('l', strtotime($date)), $weekDaynames)){
                $row['title'] = 'Available';
                $row['color'] = '#35FF35';
                $row['date'] = $date;
            }
            array_push($availableDates, $row);
        }
        return response()->json($availableDates);
    }
}
