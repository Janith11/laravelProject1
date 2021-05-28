<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class OwnerDashboadController extends Controller
{
    public function index(){
        // $student_count = User::where('role')->get();
        $count=User::where('role_id',3)->count();
        return view('owner.ownerdashboad', compact('count'));
    }
}
