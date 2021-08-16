<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\User;
use App\StudentCategory;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RequestAlert;
use App\OwnerShedule;
use App\SheduledStudents;
use App\AlertForStudent;
use App\SheduleAlert;
//0 received
//1 viewed ->clicked the alert
class RequestAlertController extends Controller
{
    public function index(){
        $notifications=RequestAlert::all();
        return view('owner.Alert.viewalert',compact('notifications'));
    }
    public function redirect($userid,$description,$id){
        if($description == '1'){
            $registration=User::where('id',$userid)->get();
            $category=StudentCategory::where('user_id',$userid)->get();
            $details = CompanyDetails::first();
            $logo = $details->logo;
            $reqalerts=RequestAlert::find($id);
            $reqalerts->status=1;
            $reqalerts->save();

            return view('owner.requests.reviewrequest',compact('registration','category', 'logo'));
        }else{
            $requestdetails=OwnerShedule::with('sheduledstudents')->where('shedule_status',4)->get();
            $userdetails=User::all();
            return view('owner.sheduling.schedulerequests',compact('requestdetails','userdetails'));
        }
    }
    public function acceptschedule($id){
        $ownerschedule=OwnerShedule::where('id',$id)->first();
        $studentuid=SheduledStudents::where('shedule_id',$id)->first();
            $ownerschedule->shedule_status=1;
            $ownerschedule->save();
            SheduleAlert::create([
                'shedule_id' => $ownerschedule->id,
                'message'=>'Your request has been confirmed'
            ]);
            AlertForStudent::create([
                'shedulealert_id'=>$id,
                'student_id'=>$studentuid->student_id,
                'alert_status'=>0
            ]);
            AlertForStudent::create([
                'shedulealert_id'=>$id,
                'student_id'=>$ownerschedule->instructor,
                'alert_status'=>0
            ]);
            return redirect()->route('loadrequestalerts',[6,2,1])->with('successmsg', 'Student schedule request accepted successfully !');
    }
}
