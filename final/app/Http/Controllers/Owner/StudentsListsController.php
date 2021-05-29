<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsListsController extends Controller{
      
    public function index(){
        return view ('owner.studentslists');
    }
}
