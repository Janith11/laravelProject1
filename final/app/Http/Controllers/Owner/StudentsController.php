<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index(){
        $students = Student::with('user')->get();
        return view('owner\studentslist', compact('students'));
    }

    //return add student page (form)
    public function addstudent(){
        return view('owner\addstudent');
    }

    //insert student in to databse
    public function insertstudent(){
        //
    }

    // >> button result page
    public function viewstudent($user_id){
        //
    }

}
