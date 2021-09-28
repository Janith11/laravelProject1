<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OuterStudentMessage;

class CandidateController extends Controller
{
    public function index(){
        return view('candidate.candidatedashboard');
    }

    public function requests(Request $request){
        $this->validate($request, [
            'message' => 'required',
            'id' => 'required',
            'uname' => 'required',
        ]);

        $post = OuterStudentMessage::create([
            'uid' => $request->id,
            'name' => $request->uname,
            'message' => $request->message
        ]);

        return redirect()->back()->with('successmsg', 'Message sent Successfully!');

    }
}
