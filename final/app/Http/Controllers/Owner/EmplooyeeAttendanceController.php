<?php

namespace App\Http\Controllers\Owner;

use App\EmplooyeeLeave;
use App\EmployeeAttendances;
use App\Http\Controllers\Controller;
use App\Instructor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// 0 - day start
// 2 - checkin
// 1 - present (after checkout)
// 3 - not attend

class EmplooyeeAttendanceController extends Controller
{
    public function index(){

        // start
        $today = Carbon::now()->today();

        $leave_user_ids = [];

        // check today attendance row is insert or not
        $today_attendances = EmployeeAttendances::where('date', $today)->count();
        if ($today_attendances == 0) {

            // get leaves
            $leave_days = EmplooyeeLeave::where('status', 1)->get();

            // get today leave instructor ids
            // $leave_user_ids = [];
            foreach ($leave_days as $leave) {

                if ($leave->end_date == '') {
                    if (strtotime($leave->start_date) == strtotime($today)) {
                        $leave_user_ids[] = $leave->user_id;
                    }
                }else{
                    if (($today >= $leave->start_date) && ($today <= $leave->end_date)) {
                        $leave_user_ids[] = $leave->user_id;
                    }
                }
            }

            // insert leave instructor attendance
            if (count($leave_user_ids) > 0) {
                foreach ($leave_user_ids as $id) {
                    $leave_attend = EmployeeAttendances::create([
                        'user_id' => $id,
                        'date' => $today,
                        'present_time' => '00:00:00',
                        'leave_time' => '00:00:00',
                        'status' => 3,
                    ]);
                }
            }

            // get not leave instructoes list
            $instructor_ids = collect($leave_user_ids);
            $instructors = Instructor::whereNotIn('user_id', $instructor_ids)->get();

            //insert not leave instructors attendance
            if (count($instructors) != 0) {
            //     return view('owner.attendances.todayattendance')->with('message', 'All Instructors are Leave today');
            // }else{
                foreach ($instructors as $instructor) {
                    $attend = EmployeeAttendances::create([
                        'user_id' => $instructor->user_id,
                        'date' => $today,
                        'present_time' => '00:00:00',
                        'leave_time' => '00:00:00',
                        'status' => 0,
                    ]);
                }
            }

        }
        //end

        $firstday = Carbon::now()->startOfMonth();
        $lastday = Carbon::now()->endOfMonth();

        $employees = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }])->get();

        $attendances = EmployeeAttendances::whereBetween('date', [$firstday, $lastday])->where('status', 1)->select('user_id', DB::raw('count(*) as count'))->groupBy('user_id')->get();

        $leaves = EmployeeAttendances::whereBetween('date', [$firstday, $lastday])->where('status', 3)->select('user_id', DB::raw('count(*) as count'))->groupBy('user_id')->get();

        $leave_count = EmplooyeeLeave::where('start_date', $today)->where('status', 0)->count();

        $unmarked_attendances = EmployeeAttendances::where('date', '<', $today)->where('status', 0)->count();

        // return $leaves;
        return view('owner.attendances.attendancelist', compact('employees', 'attendances', 'leaves', 'leave_count', 'unmarked_attendances'));
    }

    public function todayattendance(){

        $today = Carbon::now()->today();

        $leave_user_ids = [];

        // check today attendance row is insert or not
        $today_attendances = EmployeeAttendances::where('date', $today)->count();
        if ($today_attendances == 0) {

            // get leaves
            $leave_days = EmplooyeeLeave::where('status', 1)->get();

            // get today leave instructor ids
            // $leave_user_ids = [];
            foreach ($leave_days as $leave) {

                if ($leave->end_date == '') {
                    if (strtotime($leave->start_date) == strtotime($today)) {
                        $leave_user_ids[] = $leave->user_id;
                    }
                }else{
                    if (($today >= $leave->start_date) && ($today <= $leave->end_date)) {
                        $leave_user_ids[] = $leave->user_id;
                    }
                }
            }

            // insert leave instructor attendance
            if (count($leave_user_ids) > 0) {
                foreach ($leave_user_ids as $id) {
                    $leave_attend = EmployeeAttendances::create([
                        'user_id' => $id,
                        'date' => $today,
                        'present_time' => '00:00:00',
                        'leave_time' => '00:00:00',
                        'status' => 3,
                    ]);
                }
            }

            // get not leave instructoes list
            $instructor_ids = collect($leave_user_ids);
            $instructors = Instructor::whereNotIn('user_id', $instructor_ids)->get();

            //insert not leave instructors attendance
            if (count($instructors) != 0) {
            //     return view('owner.attendances.todayattendance')->with('message', 'All Instructors are Leave today');
            // }else{
                foreach ($instructors as $instructor) {
                    $attend = EmployeeAttendances::create([
                        'user_id' => $instructor->user_id,
                        'date' => $today,
                        'present_time' => '00:00:00',
                        'leave_time' => '00:00:00',
                        'status' => 0,
                    ]);
                }
            }

        }

        // get not leaved insructor on today
        $instructor_ids = collect($leave_user_ids);

        $instructors = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }, 'employeeatendancess' => function($query) use($today){
            $query->where('date', $today);
        }])->whereNotIn('user_id', $instructor_ids)->get();

        $still_working = EmployeeAttendances::where('date', $today)->where('status', 2)->count();
        $not_attend = EmployeeAttendances::where('date', $today)->where('status', 0)->count();
        $todayleaves = EmployeeAttendances::where('date', $today)->where('status', 3)->count();

        return view('owner.attendances.todayattendance', compact('instructors', 'still_working', 'not_attend', 'todayleaves'));
    }

    public function savecheckin(Request $request){

        $this->validate($request, [
            'checkin_time' => 'required',
        ]);

        $user_id = $request->user_id;
        $checkin = $request->checkin_time;
        $date = Carbon::today();
        $id = $request->id;

        $employee_attendance = EmployeeAttendances::find($id);
        $employee_attendance->present_time = $checkin;
        $employee_attendance->status = 2;
        $employee_attendance->save();

        return redirect()->route('todayattendance')->with('successmsg', 'Attendance Checkin Adedd Successfully !!');

    }

    public function savecheckout(Request $request){

        $this->validate($request, [
            'checkout_time' => 'required',
        ]);

        $user_id = $request->user_id;
        $id = $request->id;
        $checkout = $request->checkout_time;
        $date = Carbon::today();
        $present_time = $request->present_time;

        if ($present_time >= $checkout) {
            return back()->with('errormsg', 'Please Recheck checkout time !!');
        }else{

            $save_checkout = EmployeeAttendances::find($id);
            $save_checkout->leave_time = $checkout;
            $save_checkout->status = 1;
            $save_checkout->save();

            return redirect()->route('todayattendance')->with('successmsg', 'Attendance Checkout Adedd Successfully !!');

        }

    }

    public function saveabsent(Request $request){
        $id = $request->id;
        $employee_attend = EmployeeAttendances::find($id);
        $employee_attend->status = 3;
        $employee_attend->save();

        return redirect()->route('todayattendance')->with('successmsg', 'Attendance Absent Adedd Successfully !!');
    }

    public function attendancedetails($user_id){
        $users = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }])->where('user_id', $user_id)->get();
        $pending_leaves = EmplooyeeLeave::where('user_id', $user_id)->where('status', 0)->count();
        $total_leaves = EmployeeAttendances::where('user_id', $user_id)->where('status', 3)->count();
        return view('owner.attendances.attendancedetails', compact('users', 'pending_leaves', 'total_leaves'));
    }

    public function instructorattendancedetails($id){
        $attendance = EmployeeAttendances::where('user_id',$id)->get();
        $responce= [];
        foreach ($attendance as $attend) {
            $row = [];
            if ($attend->status == 1) {
                $row['title'] = 'Attend';
                $row['color'] = '#2BEC5B';
                $row['textColor'] = '#222944';
            }elseif($attend->status == 3){
                $row['title'] = 'Leave';
                $row['color'] = '#EB0B56';
                $row['textColor'] = 'white';
            }else{
                $row['title'] = 'Pending';
                $row['color'] = '#C2E20A';
                $row['textColor'] = '#222944';
            }
            $row['date'] = $attend->date;
            // return $attend;
            // return $row;
            array_push($responce, $row);
        }
        // return $responce;
        return response()->json($responce);
    }

    public function unmarkedattendance(){
        $today = Carbon::now()->today();
        $unmarked_attendances_list = EmployeeAttendances::where('status', 0)->where('date', '<', $today)->get();
        $instructors = Instructor::with(['user' => function($query){
            $query->where('status', 1);
        }])->get();
        return view('owner.attendances.unmarkedattendance', compact('unmarked_attendances_list', 'instructors'));
    }

    public function saveunmarkedattend(Request $request){
        $row = $request->row_id;
        $status = $request->status;
        if ($status == 'absent') {
            $checkin = "00:00:00";
            $checkout = "00:00:00";
            $status = 3;
        }else{
            $status = 1;
            $checkin = $request->checkin;
            $checkout = $request->checkout;
            if (($checkin == '') || ($checkout == '')) {
                return back()->with('errormsg', 'empty value input !!');
            }
            if($checkout < $checkin){
                return back()->with('errormsg', 'please chek your input times !!');
            }
        }
        $update = EmployeeAttendances::find($row);
        $update->present_time = $checkin;
        $update->leave_time = $checkout;
        $update->status = $status;
        $update->save();

        return redirect()->route('attendanceslist')->with('successmsg', 'Mark attendance successfully !!');
    }

}
