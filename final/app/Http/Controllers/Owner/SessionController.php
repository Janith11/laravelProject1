<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function theory(){
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.session.theorysession', compact('logo'));
    }

    public function practicle(){
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.session.practiclesession', compact('logo'));
    }

    public function update_practicle_sessions(Request $request){

    }
}
