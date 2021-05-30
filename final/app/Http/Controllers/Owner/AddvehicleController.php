<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;
use Image;

class AddvehicleController extends Controller
{
    public function index(){
        return view('owner.addvehicle');
    }

    public function addvehicle(Request $request){
        
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
}
