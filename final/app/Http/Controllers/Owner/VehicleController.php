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
        $details = CompanyDetails::first();
        $logo = $details->logo;
        if($vehicle_count > 0){
            return view('owner.vehicle.vehicles', compact('vehicles', 'vehicle_count', 'logo'));
        }else{
            return view('owner.vehicle.vehicles', ['vehicle_count' => 0, 'emptymsg' => 'hellow', 'logo' => 'logo']);
        }

    }

    public function addvehicle(){
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.vehicle.addvehicle', compact('logo'));
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
        $details = CompanyDetails::first();
        $logo = $details->logo;
        return view('owner.vehicle.editvehicle', compact('editvehicle', 'logo'));
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
        $details = CompanyDetails::first();
        $logo = $details->logo;

        $searchvehicle = Vehicle::where('name','=', $name)->get();
        if( count($searchvehicle) > 0){
            return view('owner.vehicle.searchvehicleresult', compact('searchvehicle', 'logo'));
        }else{
            return back()->with('searcherror', 'No Match Items !!');
        }

    }

}
