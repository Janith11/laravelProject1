<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\EmplooyeeLeave;
use App\Http\Controllers\Controller;
use App\Instructor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// 0 - pending
// 1 - confirm
// 2 - cancel

class LeaveController extends Controller
{
    public function leaverequest(){

        $firstday = Carbon::now()->startOfMonth();
        $lastday = Carbon::now()->endOfMonth();

        $pending_requests = EmplooyeeLeave::with('user')->where('status', 0)->get();

        $users = [];

        foreach ($pending_requests as $request) {
            $users[] = $request->user_id;
        }

        $users_lives = [];
        foreach ($users as $user) {
            $count = EmplooyeeLeave::where('user_id', $user)->whereBetween('start_date', [$firstday, $lastday])->where('status', 1)->count();
            $users_lives[$user] = $count;
        }

        $details = CompanyDetails::first();
        $logo = $details->logo;

        return view('owner.leave.leaverequest', compact('pending_requests', 'users_lives', 'logo'));
    }

    public function acceptrequest(Request $request){
        $id = $request->request_id;
        $request = EmplooyeeLeave::find($id);
        $request->status = 1;
        $request->save();

        return redirect()->route('leaverequest')->with('successmsg', 'Accept request successfully !!');
    }

    public function ignorerequest(Request $request){
        $id = $request->request_id;
        $request = EmplooyeeLeave::find($id);
        $request->status = 2;
        $request->save();

        return redirect()->route('leaverequest')->with('successmsg', 'Ignore request successfully !!');
    }

    public function levaedetails($id){
        $details = EmplooyeeLeave::where('user_id', $id)->orderBy('start_date')->get()->reverse();
        $detail = CompanyDetails::first();
        $logo = $detail->logo;
        return view('owner.leave.leavedetails', compact('details', 'logo'));
    }

}
