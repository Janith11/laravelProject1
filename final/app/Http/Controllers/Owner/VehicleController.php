<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;
use Image;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        $vehicle_count = Vehicle::count();
        if($vehicle_count > 0){
            return view('owner.vehicles', compact('vehicles', 'vehicle_count'));
        }else{
            return view('owner.vehicles', ['vehicle_count' => 0, 'emptymsg' => 'helow']);
        }

    }

    public function addvehicle(){
        return view('owner.addvehicle');
    }

    public function insertvehicle(Request $request){
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg, png, jpg',
        ]);

        if ($files = $request->file('image')) {

            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();

            $destinationPath = public_path('/uploadimages/vehicles/');
            $img = Image::make($files->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imagename);
            // another method fore delete and save
            // $img->fit(200)->save($destinationPath.'/'.$imagename);

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

    public function uploadCropImage(Request $request)
    {
        $image = $request->image;


        // list($type, $image) = explode(';', $image);
        // list(, $image)      = explode(',', $image);
        // $image = base64_decode($image);
        // $image_name= time().'.png';
        // $path = public_path('upload/'.$image_name);

        // file_put_contents($path, $image);
        // return response()->json(['status'=>true]);
    }

    public function editvehicle($id){

        $editvehicle = Vehicle::find($id);
        return view('owner.editvehicle', compact('editvehicle'));
    }

    public function updatevehicle(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg, png, jpg',
        ]);

        if ($files = $request->file('image')) {

            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();

            $destinationPath = public_path('/uploadimages/vehicles/');
            $img = Image::make($files->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imagename);

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
            return view('owner.searchvehicleresult', compact('searchvehicle'));
        }else{
            return back()->with('searcherror', 'No Match Items !!');
        }

    }

}
