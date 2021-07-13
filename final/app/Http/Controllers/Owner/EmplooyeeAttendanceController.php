<?php

namespace App\Http\Controllers\Owner;

use App\EmployeeAttendances;
use App\Http\Controllers\Controller;
use App\Instructor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmplooyeeAttendanceController extends Controller
{
    public function index(){
        $firstday = date('m-01-Y');
        $lastday = date('m-t-Y');
        $employees = Instructor::with(['user', 'employeeatendancess' => function($query) use($firstday, $lastday){
            $query->whereBetween('date', [$firstday, $lastday])->count();
        }])->get();
        // return $employee;
        return view('owner.attendances.attendancelist', compact('employees'));
    }

    public function todayattendance(){
        $instructors = Instructor::with('user')->get();
        return view('owner.attendances.todayattendance', compact('instructors'));
    }
}
