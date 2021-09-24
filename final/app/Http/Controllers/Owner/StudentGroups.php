<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentGroups extends Controller
{
    public function index(){
        $groups = Student::select('group_number', DB::raw('count(*) as total_students'))->groupBy('group_number')->get();
        $group_numbers = [];
        foreach($groups as $group){
            $group_numbers[] = $group->group_number;
        }
        $studentswithgroups = [];
        $students = Student::with('studentcategories', 'exams')->get();
        foreach($group_numbers as $number){
            $child = [];
            $total_students = $complete_count = $still_training = $bick_trainers = $threweel_trainers = $dualperposes_trainers = $hevyvehicle_trainers = $theory_fail = $theory_pass = $faceto_theory = $faceto_practicle = $practical_fail = $practical_pass = 0;
            foreach($students as $student){
                if ($student->group_number == $number) {
                    $total_students++;
                    if($student->total_session == $student->completed_session){
                        $complete_count++;
                    }else{
                        $still_training++;
                    }
                    foreach($student->studentcategories as $cat){
                        if($cat->category == 'A'){
                            $bick_trainers++;
                        }
                        if($cat->category == 'B1'){
                            $threweel_trainers++;
                        }
                        if($cat->category == 'C1'){
                            $dualperposes_trainers++;
                        }
                        if($cat->category == 'C'){
                            $hevyvehicle_trainers++;
                        }
                    }
                    foreach($student->exams as $exam){
                        if($exam->type == 'theory'){
                            if($exam->result == 'none'){
                                $faceto_theory++;
                            }
                            if($exam->result == 'pass'){
                                $theory_pass++;
                            }
                            if($exam->result == 'fail'){
                                $theory_fail++;
                            }
                        }
                        if($exam->type == 'practical'){
                            if($exam->result == 'none'){
                                $faceto_practicle++;
                            }
                            if($exam->result == 'pass'){
                                $practical_pass++;
                            }
                            if($exam->result == 'fail'){
                                $practical_fail++;
                            }
                        }
                    }
                }
            }
            $child['group_number'] = $number;
            $child['total_studnets'] = $total_students;
            $child['complete_studnets'] = $complete_count;
            $child['still_training'] = $still_training;
            $child['bick_trainers'] = $bick_trainers;
            $child['threeweel_traineres'] = $threweel_trainers;
            $child['dualperposes_trainers'] = $dualperposes_trainers;
            $child['hevyvehicle_trainers'] = $hevyvehicle_trainers;
            $child['theory_pass'] = $theory_pass;
            $child['theory_fail'] = $theory_fail;
            $child['faceto_theory'] = $faceto_theory;
            $child['practicle_pass'] = $practical_pass;
            $child['practicle_fail'] = $practical_fail;
            $child['faceto_practicle'] = $faceto_practicle;
            array_push($studentswithgroups, $child);
        }
        // return $studentswithgroups;
        $studentswithgroups = array_reverse($studentswithgroups);
        return view('owner.groups.grouplist', compact('studentswithgroups'));
    }
}
