<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class StudentDashboadController extends Controller
{
    public function index(){
        $user = auth()->user();
        // dd($user);
        return view('student.studentdashboad',compact('user'));
    }
}
