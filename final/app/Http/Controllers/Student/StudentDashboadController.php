<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class StudentDashboadController extends Controller
{
    public function index(){
        return view('student.studentdashboad');
    }
}
