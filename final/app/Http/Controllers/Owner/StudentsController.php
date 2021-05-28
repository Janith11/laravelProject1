<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index(){
        $students = User::where('role_id','=', 3)->get();
        return view('owner\students', compact('students'));
    }
}
