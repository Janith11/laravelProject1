<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
use App\Shedule;
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

        $shedules = Shedule::where('instructor', $id)->get();
        // return $trainingcategories;

        $today = Carbon::now()->today();
        $currentmonth = date('M', strtotime($today));
        $getmonths = [];
        for ($i=0; $i < 6; $i++) {
            $month = date('M', strtotime("-$i month", strtotime($currentmonth)));
            $getmonths[] = $month;
        }
        $getmonths = array_reverse($getmonths);
        $getsessions = [];
        foreach ($trainingcategories as $cat) {
            $child = [];
            foreach($vehiclecaategories as $vcat){
                if($vcat->category_code == $cat){
                    $child['label'] = ucwords($vcat->name);
                }
            }
            $datachild = [];
            foreach($getmonths as $month){
                $firstday = date('Y-m-01', strtotime($month));
                $lastday = date('Y-m-t', strtotime($month));
                $cat_count = Shedule::where('instructor', $id)->whereBetween('date', [$firstday, $lastday])->where('vahicle_category', $cat)->count();
                array_push($datachild, $cat_count);
                //
            }
            $child['data'] = $datachild;
            $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF57)), 6, '0', STR_PAD_LEFT);
            $child['borderColor'] = $color;
            $child['backgroundColor'] = $color;
            $child['borderWidth'] = 1;
            array_push($getsessions, $child);
        }

        return view('student.instructor.instructorprofile', compact('instructor', 'vehiclecaategories', 'getmonths', 'getsessions'));
    }
}
