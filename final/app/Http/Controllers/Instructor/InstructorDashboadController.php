<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class InstructorDashboadController extends Controller
{
    public function index(){
        return view('instructor.instructordashboad');
    }
}
