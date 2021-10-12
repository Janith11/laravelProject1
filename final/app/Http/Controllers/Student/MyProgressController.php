<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Shedule;
use App\Student;
use App\StudentCategory;
use App\StudentProgress;
use App\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProgressController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;

        $training_categories = StudentCategory::where('user_id', $user_id)->select('category')->get();
        $categories = [];
        foreach ($training_categories as $cat) {
            $categories[] = $cat->category;
        }

        // values for category summery
        $vcategories = VehicleCategory::all();
        $dataset = [];
        foreach ($categories as $cat) {
            $child = [];
            foreach ($vcategories as $vcat) {
                if($vcat->category_code == $cat){
                    $child['label'] = ucwords($vcat->name);
                }
            }
            $datachild = [];
            for ($i = 1; $i <= 4 ; $i++) {
                $result = StudentProgress::where('user_id', $user_id)->where('category_code' , $cat)->where('grade', $i)->count();
                $datachild[] = $result;
            }
            $child['data'] = $datachild;
            $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF57)), 6, '0', STR_PAD_LEFT);
            $child['borderColor'] = $color;
            $child['backgroundColor'] = $color;
            $child['borderWidth'] = 1;
            array_push($dataset, $child);
        }

        // values for dounut chart
        $yValues = [];
        for ($i = 1; $i <= 4; $i++) {
            $result = StudentProgress::where('grade', $i)->count();
            $yValues[] = $result;
        }

        // training counts;
        $trainingcat = StudentCategory::where('user_id', $user_id)->select(['category', 'transmission'])->get();
        $trainingcounts = [];
        foreach($trainingcat as $cat){
            $child = [];
            $res = Shedule::where('vahicle_category', $cat->category)->where('transmission', $cat->transmission)->where('shedule_status', 2)->whereHas('sheduledstudents', function($query) use($user_id){
                $query->where('student_id', $user_id);
            })->count();
            $child['category'] = $cat->category;
            $child['count'] = $res;
            array_push($trainingcounts, $child);
        }

        // session counts
        $completed_session = Student::select('completed_session')->where('user_id', $user_id)->first();
        $total_session =  Student::where('user_id', $user_id)->select('total_session')->first();

        return view('student.progress.myprogress', compact('yValues', 'dataset', 'trainingcounts', 'completed_session', 'total_session', 'vcategories'));
    }
}
