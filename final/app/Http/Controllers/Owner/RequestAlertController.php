<?php

namespace App\Http\Controllers\Owner;

use App\AlertForStudent;
use App\Attendance;
use App\CompanyDetails;
use App\User;
use App\StudentCategory;
use App\Student;
use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;
use App\RequestAlert;
use App\Shedule;
use App\SheduledStudents;
use App\SheduleAlert;
use App\SheduleRequest;
use App\ContactUs;
use App\VehicleCategory;
use App\OuterStudentMessage;

//0 received
//1 viewed ->clicked the alert
// 2 ignore

class RequestAlertController extends Controller
{
    public function index(){
        $notifications = RequestAlert::all();
        //get shedule request details
        $shedulerequests = SheduleRequest::where('status', 0)->with('shedules')->get();
        $students = Student::with('user')->get();
        $contactus=ContactUs::orderBy('created_at','DESC')->get();
        $outer_Messages=OuterStudentMessage::orderBy('created_at','DESC')->get();
        return view('owner.Alert.viewalert',compact('notifications', 'shedulerequests', 'students','contactus','outer_Messages'));
    }

    public function redirect($userid,$description,$id){
        if($description == '1'){
            $registration=User::where('id',$userid)->get();
            $category=StudentCategory::where('user_id',$userid)->get();
            $reqalerts=RequestAlert::find($id);
            $vehiclecategory = VehicleCategory::all();
            $reqalerts->status=1;
            $reqalerts->save();

            return view('owner.requests.reviewrequest',compact('registration','category','vehiclecategory'));
        }
        // }else{
        //     $requestdetails=Shedule::with('sheduledstudents')->where('shedule_status',4)->get();
        //     $userdetails=User::all();
        //     return view('owner.sheduling.schedulerequests',compact('requestdetails','userdetails'));
        // }
    }

    public function requestdetails($date, $id, $user_id){
        $result = SheduleRequest::where('id', $id)->with('Shedules')->get();
        $othershedules = Shedule::where('date', $date)->withcount('sheduledstudents')->get();
        $instructors = Instructor::with('user')->get();
        $student = Student::where('user_id', $user_id)->with('user')->get();
        $categories = VehicleCategory::all();
        foreach($result as $res){
            $category = $res->shedules->vahicle_category;
        }
        $sessioncount = Shedule::where('vahicle_category', $category)->where('shedule_status', 2)->whereHas('sheduledstudents' , function($query)use($user_id){
            $query->where('student_id', $user_id);
        })->count();
        // return $sessioncount;
        return view('owner.Alert.shedulerequestdetails', compact('result', 'othershedules', 'instructors', 'student', 'id', 'categories', 'sessioncount', 'category'));
    }

    public function accept(Request $request){

        $requestid = $request->request_id;
        $student_id = $request->student_id;
        $instructor_id = $request->instructor_id;
        $shedule_id = $request->shedule_id;
        $date = $request->date;
        $time = $request->time;

        // set request alert as read by owner
        $shedulerequest = SheduleRequest::find($requestid);
        $shedulerequest->status = 1;
        $shedulerequest->shedule_status = 1;
        $shedulerequest->save();

        // insert sheduled students records
        $sheduledstudent = SheduledStudents::create([
            'shedule_id' => $shedule_id,
            'student_id' => $student_id
        ]);

        // make alert for student
        $studentmessage = "Your Shedule request Accepted !, Date : $date, Time : $time";
        $studentalert = SheduleAlert::create([
            'shedule_id' => $shedule_id,
            'message' => $studentmessage,
        ]);

        // send alert for student
        $alertforstudent = AlertForStudent::create([
            'shedulealert_id' => $studentalert->id,
            'student_id' => $student_id,
            'alert_status' => 0
        ]);

        // make alert for instructor
        $instructormessage = "You have to instruct a new session on $date at $time";
        $instrutoralert = SheduleAlert::create([
            'shedule_id' => $shedule_id,
            'message' => $instructormessage,
        ]);

        // send alert for instructor
        $alertforinstructor = AlertForStudent::create([
            'shedulealert_id' => $instrutoralert->id,
            'student_id' => $instructor_id,
            'alert_status' => 0
        ]);

        // student attendance
        $studentattendace = Attendance::create([
            'shedule_id' => $shedule_id,
            'user_id' => $student_id,
            'attendance' => 2
        ]);

        return redirect()->route('viewalert')->with('successmsg', 'Accept request Successfully !!');

    }

    public function ignore(Request $request){

        $requestid = $request->request_id;
        $student_id = $request->student_id;
        $shedule_id = $request->shedule_id;
        $date = $request->date;
        $time = $request->time;
        $reson = $request->reson;

        // reson validation
        $length = strlen($reson);
        if(($length < 25 ) || (preg_match('/^[a-zA-Z0-9]+$/', $reson))){
            return back()->with('errormsg', "Your reson must contains letters and numbers, reson must be greter than 25 characters !! $length");
        }
        // set request alert as read by owner
        $shedulerequest = SheduleRequest::find($requestid);
        $shedulerequest->status = 1;
        $shedulerequest->shedule_status = 2;
        $shedulerequest->save();

        // make slert for student
        $studentmessage = "Your Shedule request canceled !, Date : $date, Time : $time, Reson : $reson";
        $studentalert = SheduleAlert::create([
            'shedule_id' => $shedule_id,
            'message' => $studentmessage,
        ]);

        // send alert for student
        $alertforstudent = AlertForStudent::create([
            'shedulealert_id' => $studentalert->id,
            'student_id' => $student_id,
            'alert_status' => 0
        ]);

        return redirect()->route('viewalert')->with('successmsg', 'Canceled request Successfully !!');

    }
}
