<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\User;
use App\Posts;
use App\StudentCategory;
use App\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class StudentDashboadController extends Controller
{
    public function index(){
        $student=Student::where('user_id',Auth::user()->id)->with('user')->get();
        $studentcategory=StudentCategory::where('user_id',Auth::user()->id)->get();
        $posts = Posts::with('user')->orderBy('updated_at', 'desc')->get();
        return view('student.studentdashboad',compact('student','studentcategory','posts'));
    }
}
