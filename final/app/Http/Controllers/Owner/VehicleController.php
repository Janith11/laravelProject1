<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;
use Image;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        $vehicle_count = Vehicle::count();
        return view('owner.vehicle.vehicles', compact('vehicles'));
    }

    public function addvehicle(){
        return view('owner.vehicle.addvehicle');
    }

    public function insertvehicle(Request $request){
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg, png, jpg',
        ]);

        if ($files = $request->file('image')) {

            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();

            // move to folder
            $destinationPath = public_path('/uploadimages/vehicles/');
            $files->move($destinationPath, $imagename);

            // save in database
            $vehicle = new Vehicle;
            $vehicle->name = $request->name;
            $vehicle->description = $request->description;
            $vehicle->image = "$imagename";
            $vehicle->save();
            return redirect()->route('vehicles')->with('successmsg', 'Vehicle added successfuly !');
        }
        return back()->with('error', 'Cannot upload !!');
    }

    public function editvehicle($id){
        $editvehicle = Vehicle::find($id);
        return view('owner.vehicle.editvehicle', compact('editvehicle'));
    }

    public function updatevehicle(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg, png, jpg',
        ]);

        if ($files = $request->file('image')) {

            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();

            // move to folder
            $destinationPath = public_path('/uploadimages/vehicles/');
            $files->move($destinationPath, $imagename);

            // save in database
            $vehicle = Vehicle::find($id);
            $vehicle->name = $request->name;
            $vehicle->description = $request->description;
            $vehicle->image = "$imagename";
            $vehicle->save();
            return redirect()->route('vehicles')->with('successmsg', 'Save Changes successfuly !!');
        }
        return back()->with('error', 'Cannot upload !!');
    }

    public function deletevehicles($id){
        Vehicle::find($id)->delete();
        return redirect()->route('vehicles')->with('successmsg', 'Vehicle Removed Successfully !!');
    }

    public function searchvehicle(Request $request){

        $this->validate($request, [
            'searchvehicle' => 'required',
        ]);

        $name = $request->searchvehicle;

        $searchvehicle = Vehicle::where('name','=', $name)->get();
        if( count($searchvehicle) > 0){
            return view('owner.vehicle.searchvehicleresult', compact('searchvehicle'));
        }else{
            return back()->with('searcherror', 'No Match Items !!');
        }

    }

}
