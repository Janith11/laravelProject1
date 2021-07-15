<?php

namespace App\Http\Controllers\Owner;

use App\EmplooyeeLeave;
use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;

// 0 - pending
// 1 - confirm
// 2 - cancel

class LeaveController extends Controller
{
    public function leaverequest(){
        $pending_requests = EmplooyeeLeave::with('user')->where('status', 0)->get();
        return view('owner.leave.leaverequest', compact('pending_requests'));
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

}
