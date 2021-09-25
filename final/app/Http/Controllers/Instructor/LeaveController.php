<?php

namespace App\Http\Controllers\Instructor;

use App\EmplooyeeLeave;
use App\EmployeeAttendances;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    public function request(){
        return view('instructor.attendance.requestleave');
    }

    public function requestleave(Request $request){

        $this->validate($request, [
            'start_date' => 'required',
            'reson' => 'required|min:10'
        ]);

        $user_id = Auth::user()->id;
        $current_date = Carbon::now()->today();
        $selected_start_date = $request->start_date;
        $selected_end_date = $request->end_date;

        if ($current_date > $selected_start_date) {
            return back()->with('errormsg', 'You Cannot request a leave on previous date !!');
        }else{
            $check = EmplooyeeLeave::where('user_id', $user_id)->where('start_date', $selected_start_date)->count();
            if ($check > 0 ) {
                return back()->with('errormsg', 'You already have taken leave on this day !!');
            }else{
                $results = EmplooyeeLeave::where('user_id', $user_id)->where('end_date' ,'>', $current_date)->get();
                foreach ($results as $result) {
                    if (($result->start_date <= $selected_start_date) && ($result->end_date >= $selected_start_date)) {
                        return back()->with('errormsg', 'You already have taken leave on this day !!');
                        echo 'cant<br>';
                    }
                    if ($selected_end_date != '') {
                        if (($result->start_date <= $selected_end_date) && ($result->end_date >= $selected_end_date)) {
                            return back()->with('errormsg', 'You already have taken leave on this day !!');
                        }
                    }

                }
                
                $end_date = Null;
                if ($selected_end_date != '') {
                    $end_date = $selected_end_date;
                }
                $leaverequest = EmplooyeeLeave::create([
                    'user_id' => Auth::user()->id,
                    'reson' => $request->reson,
                    'start_date' => $selected_start_date,
                    'end_date' => $end_date,
                    'status' => 0
                ]);
                return redirect()->route('instructorattendancelist')->with('successmsg', 'Leave Request Successfully Send !!');
            }

        }

    }

    public function pendingrequestdetails(){
        $user_id = Auth::user()->id;
        $pending_requests = EmplooyeeLeave::where('user_id', $user_id)->where('status', 0)->get();
        return view('instructor.attendance.pendingrequestdetails', compact('pending_requests'));
    }

    public function cancelrequest($id){
        $leave = EmplooyeeLeave::find($id)->delete();
        return redirect()->route('instructorattendancelist')->with('successmsg', 'Leave Request Successfully Canceled !!');
    }

    public function leavedetails(){
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $leaves = EmplooyeeLeave::where('user_id', Auth::user()->id)->whereBetween('start_date', [$start, $end])->orderBy('start_date')->get();
        return view('instructor.attendance.monthleavedetails', compact('leaves'));
    }

    public function allleavedetails(){
        $leaves = EmplooyeeLeave::where('user_id', Auth::user()->id)->orderBy('start_date')->get();
        return view('instructor.attendance.allleavedetails', compact('leaves'));
    }
}
