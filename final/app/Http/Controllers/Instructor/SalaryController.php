<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $salaries = Salary::where('user_id', $user_id)->orderBy('date')->get()->reverse();
        return view('instructor.salary.salary', compact('salaries'));
    }
}
