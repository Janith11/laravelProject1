<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\EmplooyeeLeave;
use App\EmployeeAttendances;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class OwnerDashboadController extends Controller
{
    public function index(){
        // $student_count = User::where('role')->get();
        $count=User::where('role_id',3)->count();

        // insert today attendance records
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

        //check incomplete shedules
        $current = Carbon::now()->today();
        $check = OwnerShedule::select('id')->where('date', '<', $current)->where('shedule_status', '=', 1)->get();
        if(count($check) > 0){
            foreach ($check as $key => $value) {
                $result = OwnerShedule::find($value->id);
                $result->shedule_status = 4;
                $result->color = "#FF891A";
                $result->textColor = "#040124";
                $result->save();
            }
        }

        return view('owner.ownerdashboad', compact('count'));
    }
}
