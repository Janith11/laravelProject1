<?php

namespace App\Http\Controllers\Owner;

use App\EmplooyeeLeave;
use App\EmployeeAttendances;
use App\Http\Controllers\Controller;
use App\Instructor;
use Carbon\Carbon;
use Illuminate\Http\Request;

// 0 - day start
// 2 - checkin
// 1 - present (after checkout)
// 3 - not attend

class EmplooyeeAttendanceController extends Controller
{
    public function index(){
        $firstday = date('m-01-Y');
        $lastday = date('m-t-Y');
        $employees = Instructor::with(['user', 'employeeatendancess' => function($query) use($firstday, $lastday){
            $query->whereBetween('date', [$firstday, $lastday]);
        }])->get();
        // return $employees;
        return view('owner.attendances.attendancelist', compact('employees'));
    }

    public function todayattendance(){

        $today = Carbon::today();

        $today_attendances = EmployeeAttendances::where('date', $today)->count();
        if ($today_attendances == 0) {
            $leaves = EmplooyeeLeave::where('date', $today)->where('status', 1)->get();

            $ids = [];

            foreach ($leaves as $leave) {
                $ids[] = $leave->user_id;
            }

            $instructor_ids = collect($ids);
            $instructors = Instructor::whereNotIn('user_id', $instructor_ids)->get();

            if (count($instructors) == 0) {
                return view('owner.attendances.todayattendance')->with('message', 'All Instructors are Leave today');
            }else{
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

        $leaves = EmplooyeeLeave::where('date', $today)->where('status', 1)->get();

        $ids = [];

        foreach ($leaves as $leave) {
            $ids[] = $leave->user_id;
        }

        $instructor_ids = collect($ids);

        $instructors = Instructor::with(['user', 'employeeatendancess' => function($query) use($today){
            $query->where('date', $today);
        }])->whereNotIn('user_id', $instructor_ids)->get();

        $still_working = EmployeeAttendances::where('date', $today)->where('status', 2)->count();
        $not_attend = EmployeeAttendances::where('date', $today)->where('status', 0)->count();

        return view('owner.attendances.todayattendance', compact('instructors', 'still_working', 'not_attend'));
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

}
