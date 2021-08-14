<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\User;
use App\StudentCategory;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RequestAlert;
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
            // return $re
            $reqalerts->status=1;
            $reqalerts->save();

            return view('owner.requests.reviewrequest',compact('registration','category', 'logo'));
        }else{
            
            return "Under Construction from RequestAlertController redirect method";
        }
    }
}
