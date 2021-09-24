<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterInputValiadteController extends Controller
{
    public function checkNIC($nic){
        $result = User::where('nic_number', $nic)->first();
        if(empty($result)){
            return response()->json(0);
        }else{
            return response()->json(1);
        }
    }

    public function checkMobile($mobile){
        $result = User::where('contact_number', $mobile)->first();
        if(empty($result)){
            return response()->json(0);
        }else{
            return response()->json(1);
        }
    }
}
