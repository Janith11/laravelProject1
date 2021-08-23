<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function theory(){
        return view('owner.session.theorysession');
    }

    public function practicle(){
        return view('owner.session.practiclesession');
    }

    public function update_practicle_sessions(Request $request){

    }
}
