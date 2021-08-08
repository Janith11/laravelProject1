<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\User;
use App\StudentCategory;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RequestAlert;

class RequestAlertController extends Controller
{
    public function index(){
        $notifications=RequestAlert::all();
        return view('owner.Alert.viewalert',compact('notifications'));
    }
    public function redirect($userid,$description){
        if($description == '1'){
            $registration=User::where('id',$userid)->get();
            $category=StudentCategory::where('user_id',$userid)->get();
            $details = CompanyDetails::first();
            $logo = $details->logo;
            return view('owner.requests.reviewrequest',compact('registration','category', 'logo'));
        }else{
            return "Under Construction from RequestAlertController redirect method";
        }
    }
}
