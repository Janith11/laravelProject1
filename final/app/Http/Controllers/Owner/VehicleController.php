<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Vehicle;
// use Faker\Provider\Image;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        return view('owner.vehicles', compact('vehicles'));
    }

}
