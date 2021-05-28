<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class IntructorsController extends Controller
{
    public function index(){
        $instructors = User::where('role_id','=',2)->get();
        return view('owner.instructors', compact('instructors'));
    }
}
