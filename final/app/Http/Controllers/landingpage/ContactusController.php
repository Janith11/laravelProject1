<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;
use Illuminate\Support\Facades\DB;

class ContactusController extends Controller
{
    public function index(){
        return view('landingpage.contactus');
    }
    public function insert(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'email' => 'required',
            'contactnumber' => 'required|integer',
            'hometown' => 'required',
            'message' => 'required',
        ]);

        ContactUs::create([
            'name' => $request->username,
            'email' => $request->email,
            'contactno' => $request->contactnumber,
            'hometown' => $request->hometown,
            'message' => $request->message
        ]);
        return redirect()->route('firstpage')->with('successmsg', 'one student added successfuly !');
    }
}
