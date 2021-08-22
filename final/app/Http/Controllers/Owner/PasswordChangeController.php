<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('owner.settings.changepassword');
    }

    public function store(Request $request){

        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8',
            're_enter_password' => ['same:new_password'],
            // |min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$|confirmed
        ]);

        $instructor_id = 1;

        $instructor = User::find($instructor_id);
        $instructor->password = Hash::make($request->new_password);
        $instructor->save();

        return redirect()->route('settings')->with('successmsg', 'Password Change Successfully !!');

    }
}
