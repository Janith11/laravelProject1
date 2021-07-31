<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::with(['user' , 'trainingvahiclecategorys' => function($query){
            $query->with('vehiclecategory');
        }])->get();
        return view('instructor.students.studentlist', compact('students'));
    }

    public function details($id){
        $student = Student::with(['user', 'trainingvahiclecategorys' => function($query){
            $query->with('vehiclecategory');
        }])->where('user_id', $id)->get();
        return view('instructor.students.studentdetails', compact('student'));
    }
}
