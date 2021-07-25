<?php

namespace App\Http\Controllers\Owner;

use App\User;
use App\StudentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewrequestController extends Controller
{
    public function index(){
        $requests=User::where('role_id',4)->where('status',1)->get();
        return view('owner.requests.viewrequest',compact('requests'));
    }
    public function get($id){
        $registration=User::where('id',$id)->get();
        $category=StudentCategory::where('user_id',$id)->get();
        return view('owner.requests.reviewrequest',compact('registration','category'));
    }
}
