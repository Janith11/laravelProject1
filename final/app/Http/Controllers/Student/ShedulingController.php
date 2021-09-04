<?php

namespace App\Http\Controllers\Student;

use App\AlertForStudent;
use App\ExpandRequests;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
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
use App\Exam;
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
        $today_sessions = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
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

        return view('student.sheduling.sheduling', compact('today_sessions', 'progress', 'total_session', 'completed_session', 'requestdetails', 'categorydetails', 'type'));
    }

    public function events($id){
        
        $setone = SheduledStudents::with('ownershedule')->where('student_id', $id)->get();
        $settwo = SheduleRequest::with('ownershedules')->where('user_id', $id)->get();
        $setthree = Exam::where('user_id',$id)->get();
        
        $responses = [];
        foreach($setone as $one){
            $row = [];
            if ($one->ownershedule->shedule_status == 1) {
                $row['title'] = $one->ownershedule->title;
                $row['color'] = '#35FF35';
                $row['textColor'] = '#040124';
                $row['date'] = $one->ownershedule->date;
                array_push($responses, $row);
            }elseif ($one->ownershedule->shedule_status == 2) {
                $row['title'] = $one->ownershedule->title;
                $row['color'] = '#03011F';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->ownershedule->date;
                array_push($responses, $row);
            }elseif ($one->ownershedule->shedule_status == 3) {
                $row['title'] = $one->ownershedule->title;
                $row['color'] = '#FF2957';
                $row['textColor'] = '#FFFFFF';
                $row['date'] = $one->ownershedule->date;
                array_push($responses, $row);
            }else{
                $row['title'] = $one->ownershedule->title;
                $row['color'] = '#FF891A';
                $row['textColor'] = '#040124';
                $row['date'] = $one->ownershedule->date;
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

    public function checkdate($date){

        $today = Carbon::now()->today();
        $user_id = Auth::user()->id;
        $total_session = Student::where('user_id', Auth::user()->id)->select('total_session')->first();
        $completed_session = Student::where('user_id', Auth::user()->id)->select('completed_session')->first();

        if ($date <= $today) {
            return back()->with('errormsg', 'Selected date is past date !!');
        }else{

            if ($total_session->total_session <= $completed_session->completed_session) {
                return back()->with('errormsg', 'You have already completed your total sessions !!');
            }else{

                $select_dateshedules = SheduledStudents::where('student_id', $user_id)->whereHas('ownershedule', function($query) use($date){
                    $query->where('date', $date);
                })->count();
                // return $select_dateshedules;
                if ($select_dateshedules > 0) {
                    return back()->with('errormsg', 'You Already have session on this day !!');
                }

                $select_date = $date;

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

                $time_table = TimeSlots::with('instructor_working_time_slot')->where('weekday_id', $weekday_id)->get();

                $timeslots = [];
                foreach ($time_table as $table) {
                    $timeslots[] = $table->time_slot;
                }
                $collecttimeslots = collect($timeslots);
                $student_counts = OwnerShedule::where('date', $select_date)->whereIn('time', $collecttimeslots)->withcount('sheduledstudents')->get();

                $final_counts = [];
                foreach ($timeslots as $slot) {
                    foreach ($student_counts as $count) {
                        if ($slot == $count->time) {
                            $final_counts[$slot] = $count->sheduledstudents_count;
                        }
                    }
                };

                $instructors = Instructor::with('user')->get();

                return view('student.sheduling.settimeslot', compact('time_table', 'select_date', 'final_counts', 'instructors'));

            }

        }

    }

    public function requestslot(Request $request){
        $slot_time = $request->timeslot;
        $special = $request->special_time;
        $date = $request->date;
        $type = $request->sessiontype;
        $val = $slot_time.'-instructor_id';
        $instructor = $request->$val;
        if (($slot_time == '') && ($special == '')) {
            return back()->with('errormsg', 'Empty Input !!');
        }
        if (($slot_time != '') && ($special != '')) {
            return back()->with('errormsg', 'Cannot Inputh Both !!');
        }
        if($instructor == ''){
            return back()->with('errormsg', 'Choose an Instructor !!');
        }
        if ($slot_time != '') {
            $check = OwnerShedule::where('date', $date)->where('time', $slot_time)->where('instructor', $instructor)->first();
            if(empty($check)){
                $shedule = OwnerShedule::create([
                    'title' => 'session request',
                    'date' => $date,
                    'color' => '#35FF35',
                    'textColor' => '#222944',
                    'time' => $slot_time,
                    'lesson_type' => $type,
                    'instructor' => $instructor,
                    'shedule_status' => 1,
                ]);
            }
        }
        if ($special != '') {
            $check = OwnerShedule::where('date', $date)->where('time', $special)->first();
            if (empty($check)) {
                $shedule = OwnerShedule::create([
                    'title' => 'session request',
                    'date' => $date,
                    'color' => '#35FF35',
                    'textColor' => '#222944',
                    'time' => $special,
                    'lesson_type' => $type,
                    'instructor' => $instructor,
                    'shedule_status' => 1,
                ]);
            }
        }
        if(empty($check)){
            // $shedulestudent = SheduledStudents::create([
            //     'shedule_id' => $shedule->id,
            //     'student_id' => Auth::user()->id,
            // ]);
            $shedulerequest = SheduleRequest::create([
                'shedule_id' => $shedule->id,
                'user_id' => Auth::user()->id,
                'status' => 0,
                'shedule_status' => 0
            ]);
        }else{
            // $sheduledstudent = SheduledStudents::create([
            //     'shedule_id' => $check->id,
            //     'student_id' => Auth::user()->id,
            // ]);
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
        $shedules = OwnerShedule::whereHas('sheduledstudents', function($query) use($user_id){
            $query->where('student_id', $user_id);
        })->where('shedule_status', 2)->get();
        return view('student.sheduling.progressdetails', compact('shedules'));
    }

    public function pendingrequest(){
        $user_id = Auth::user()->id;
        $shedules = SheduleRequest::with('ownershedules')->where('status', 0)->where('user_id', $user_id)->get();
        return view('student.sheduling.pendingrequest', compact('shedules'));
    }

    public function expandrequest(){
        $user_id = Auth::user()->id;
        $training_categories = StudentCategory::where('user_id', $user_id)->get();
        $category_names = VehicleCategory::all();
        $values = [];
        $unselect_category = [];
        foreach ($training_categories as $category) {
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
        $history = SheduledStudents::where('student_id', $user_id)->with('ownershedule')->get();
        $instructors = Instructor::with('user')->get();
        return view('student.sheduling.history', compact('history', 'instructors'));
    }

    public function rejected(){
        $user_id = Auth::user()->id;
        $rejectedlists = SheduleRequest::with('ownershedules')->where('user_id', $user_id)->where('shedule_status', 2)->get();
        $instructors = Instructor::with('user')->get();
        // return $instructors;
        return view('student.sheduling.rejected', compact('rejectedlists', 'instructors'));
    }

}
