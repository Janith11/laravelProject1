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
        // chart1 vehicle category 
        $vehicle_categories=Vehicle::select('category')->groupBy('category')->get();
        $allcat=[];
        $vehiclecat=[];
        foreach($vehicle_categories as $c){
            $vehiclecat[]=$c->category;
            $allcat[]= Vehicle::where('category',$c->category)->get()->count();
        }
        //chart two vehicle conditions
        $vehicle_conditions = Vehicle::select('condition')->groupBy('condition')->get();
        $concat=[];
        $vehiclecon=[];
        foreach($vehicle_conditions as $vc){
            $concat[]=$vc->condition;
            $vehiclecon[]= Vehicle::where('condition',$vc->condition)->get()->count();
        }
        // chart three group by mileage
        $mil_count=[];
        $mil_range=["<50000","<100000","<150000",">150000"];
        $mil_count[] = Vehicle::select('mileage')->where('mileage','<',50000)->count();
        $mil_count[] = Vehicle::select('mileage')->whereBetween('mileage',[50000,100000])->count();
        $mil_count[] = Vehicle::select('mileage')->whereBetween('mileage',[100000,150000])->count();
        $mil_count[] = Vehicle::select('mileage')->where('mileage','>',150000)->count();
        
        return view('owner.vehicle.vehicles', compact('vehicles','vehiclecat','allcat','concat','vehiclecon','concat','mil_count','mil_range'));
    }

    public function addvehicle(){
        return view('owner.vehicle.addvehicle');
    }

    public function insertvehicle(Request $request){
        request()->validate([
            
            'image' => 'required|image|mimes:jpeg, png, jpg',
            'name' => 'required',
            'category'=>'required',
            'transmission'=>'required',
            'condition'=>'required',
            'mileage'=>'required'
        ]);

        if ($files = $request->file('image')) {

            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();

            // move to folder
            $destinationPath = public_path('/uploadimages/vehicles/');
            $files->move($destinationPath, $imagename);

            // save in database
            $vehicle = new Vehicle;
            $vehicle->image = "$imagename";
            $vehicle->name = $request->name;
            $vehicle->category = $request->category;
            $vehicle->transmission = $request->transmission;
            $vehicle->condition = $request->condition;
            $vehicle->mileage = $request->mileage;
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
        return $request;
        
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg, png, jpg',
            'name' => 'required',
            'category'=>'required',
            'transmission'=>'required',
            'condition'=>'required',
            'mileage'=>'required'
        
            
        ]);

        if ($files = $request->file('image')) {

            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();

            // move to folder
            $destinationPath = public_path('/uploadimages/vehicles/');
            $files->move($destinationPath, $imagename);

            // save in database
            $vehicle = Vehicle::find($id);
            $vehicle->image = "$imagename";
            $vehicle->name = $request->name;
            $vehicle->category = $request->category;
            $vehicle->transmission = $request->transmission;
            $vehicle->condition = $request->condition;
            $vehicle->mileage = $request->mileage;
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
