<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\TimeSlots;
use App\TimeTable;
use App\WeekDay;
use App\Instructor;
use App\User;
use App\VehicleCategory;
use App\InstructorWorkingTimeSlot;
use App\StudentCategory;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function index(){
        // $InsCategories= StudentCategory::where('category',"A")->where('transmission',"Auto")->whereHas('Instructorcategories')->get();
        // $InstructorUid=[];
        // foreach($InsCategories as $c){
        //     $InstructorUid[]= $c->user_id;
        // }
        // $InstructorUid=collect($InstructorUid);
        // $InsNames=User::select(['f_name','l_name'])->whereIn('id',$InstructorUid)->get();
        
        // $x=json_encode(array('data'=>$InsNames));
        // return x;
        // return response()->json($InsNames); 

        $instructor=Instructor::with('user')->get();
        $timetable = WeekDay::with('timeslots')->get();
        $VehicleCategories = VehicleCategory::all();
        $instructordetails=InstructorWorkingTimeSlot::with('releventinstructor')->get();
        return view('owner.timetable.timetable', compact('timetable','instructor','instructordetails','VehicleCategories'));
    }

    public function inserttimeslot(Request $request){
        // return $request;
        $this->validate($request, [
            'slot_name'=>'required',
            'slot_time' => 'required',
            'instructor_id'=>'required',
            'exam_type'=>'required',
            
        ]);
        $ExamType =$request->exam_type;
        if($ExamType == 'Theory'){
            $timeslot=TimeSlots::create([
                'weekday_id'=>$request->date_id,
                'time_slot'=>$request->slot_time,
                'slot_name'=>$request->slot_name,
                'exam_type'=>$request->exam_type,
                'vehicle_category'=>'none',
                'transmission'=>'none'
            ]);
        }else{
            $timeslot=TimeSlots::create([
                'weekday_id'=>$request->date_id,
                'time_slot'=>$request->slot_time,
                'slot_name'=>$request->slot_name,
                'exam_type'=>$request->exam_type,
                'vehicle_category'=>$request->category,
                'transmission'=>$request->transmission
            ]);
        }
        $Iids=[];
        $Iids=$request['instructor_id'];
        foreach($Iids as $Iid){
            InstructorWorkingTimeSlot::create([
                'time_slot_id'=>$timeslot->id,
                'instructor_uid'=>$Iid
            ]);
        }
        return redirect()->route('timetable')->with('successmsg', 'Time Slot Adedd !!');
    }

    public function deletetimeslot($id){
        TimeSlots::find($id)->delete();
        InstructorWorkingTimeSlot::where('time_slot_id',$id)->delete();
        return redirect()->route('timetable')->with('successmsg', 'Time Slot Deleted !!');
    }

    public function loadinstructors($category,$transmission){
        $InsCategories= StudentCategory::where('category',$category)->where('transmission',$transmission)->whereHas('Instructorcategories')->get();
        $InstructorUid=[];
        foreach($InsCategories as $c){
            $InstructorUid[]= $c->user_id;
        }
        $InstructorUid=collect($InstructorUid);
        $InsNames=User::select(['f_name','l_name','id'])->whereIn('id',$InstructorUid)->get();
        
        return response()->json($InsNames); 
    }
}
