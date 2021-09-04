<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
use App\StudentCategory;
use App\VehicleCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(){
        $instructors = Instructor::with(['user', 'categories'])->get();
        $vehiclecaategories = VehicleCategory::all();
        return view('student.instructor.instructors', compact('instructors', 'vehiclecaategories'));
    }

    public function insprofile($id){
        $instructor = Instructor::with(['user', 'categories'])->where('user_id', $id)->get();
        $vehiclecaategories = VehicleCategory::all();

        // instructor categories
        $inscategories = StudentCategory::where('user_id', $id)->select('category')->get();
        $trainingcategories = [];
        foreach($inscategories as $cat){
            $trainingcategories[] = $cat['category'];
        }

        // current month
        $fmonth = date('M');
        $months = [];
        for ($i=0; $i <6 ; $i++) {

            // get months names
            $month = date('M', strtotime("-$i month", strtotime($fmonth)));
            $months[] = $month;

            // get first date and last date of a month
            $firstday = date('Y-m-01', strtotime($month));
            $lastday = date('Y-m-t', strtotime($month));


        }

        $shedules = OwnerShedule::where('instructor', $id)->get();
        // return $trainingcategories;

        return view('student.instructor.instructorprofile', compact('instructor', 'vehiclecaategories'));
    }
}
