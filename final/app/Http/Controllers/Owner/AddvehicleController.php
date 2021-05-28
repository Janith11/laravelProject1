<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AddvehicleController extends Controller
{
    public function index(){
        return view('owner.addvehicle');
    }

    public function addvehicle(Request $request){
        
        $this->validate($request , [
            'image' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        // $image_file = $request->image;
        // $image = Image::;
        // Response::make($image->encode('jpeg'));

        $vehicle = new Vehicle;

        $vehicle->name = $request->name;
        $vehicle->description = $request->description;
        $vehicle->image = $request->image;

        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $filename = time().'.'.$image->getClientOriginalExtension();
        //     // $newimage = Image::make($image)->resize(300, 300)->save( storage_path('/upload/vehicles/' . $filename ) );
        //     $newimage = Image::make($image)->resize(300, 300);

        //     $path = public_path().'\upload\vehicles';
        //     $uplaod = $image->move($path,$newimage);

        //     $vehicle->image = $filename;
        //     $vehicle->save();
        // }else{
        //     $vehicle->image = 'empty';
        //     $vehicle->save();
        // }

        $vehicle->save();
        return redirect()->route('vehicles')->with('successmsg', 'Vehicle added successfuly !');

    }

    public function uploadCropImage(Request $request)
    {
        $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path = public_path('upload/'.$image_name);

        file_put_contents($path, $image);
        return response()->json(['status'=>true]);
    }
}
