<?php

namespace App\Http\Controllers\Instructor;

use App\EmplooyeeLeave;
use App\EmployeeAttendances;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Owner\LeaveController;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(){

        $user_id = Auth::user()->id;

        $day_start_month = Carbon::now()->startOfMonth();
        $day_end_month = Carbon::now()->endOfMonth();

        $month_leaves = EmplooyeeLeave::where('user_id', $user_id)->where('status', 1)->get();

        $month_leave_count = 0;
        foreach ($month_leaves as $leave) {
            if ($leave->start_date < $day_end_month) {
                if ($leave->end_date) {
                    if ($leave->end_date > $day_end_month) {
                        $outside = (strtotime($day_end_month) - strtotime($leave->start_date))/60/60/24;
                        $outside = round($outside, 0) - 1;
                        $month_leave_count += $outside;
                    }else{
                        $inside = (strtotime($leave->end_date) - strtotime($leave->start_date))/60/60/24;
                        $month_leave_count += $inside;
                    }
                }else{
                    $month_leave_count += 1;
                }
            }
        }

        $pending_leave = EmplooyeeLeave::where('user_id', $user_id)->where('status', 0)->count();
        $work_days = EmployeeAttendances::where('user_id', $user_id)->whereBetween('date', [$day_start_month, $day_end_month])->where('status', 1)->count();
        $total_days = (strtotime($day_end_month) - strtotime($day_start_month))/60/60/24;
        $total_days = round($total_days, 0);

        $leaves = EmplooyeeLeave::where('user_id', $user_id)->whereBetween('start_date', [$day_start_month, $day_end_month])->orderBy('start_date')->get();

        return view('instructor.attendance.attendancelist', compact('pending_leave', 'month_leave_count', 'work_days', 'total_days', 'leaves'));
    }

    public function leaverequestdetails(){
        return view('instructor.attendance.requestleave');
    }

    public function month(){
        $user_id = Auth::user()->id;
        $firstday = Carbon::now()->startOfMonth();
        $lastday = Carbon::now()->endOfMonth();
        $result = EmplooyeeLeave::where('user_id', $user_id)->whereBetween('date', [$firstday, $lastday])->where('status', 1)->count();
        return response()->json($result);
    }

    public function calendar(){
        // 0 - day start
        // 2 - checkin
        // 1 - present (after checkout)
        // 3 - not attend
        $attendance = EmployeeAttendances::where('user_id',Auth::user()->id)->get();
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
            }elseif($attend->status == 0){
                $row['title'] = 'Pending';
                $row['color'] = '#F2F700';
                $row['textColor'] = '#222944';
            }else{
                $row['title'] = 'Working';
                $row['color'] = '#00C6F7';
                $row['textColor'] = '#222944';
            }
            $row['date'] = $attend->date;
            array_push($responce, $row);
        }
        return response()->json($responce);
    }
}
