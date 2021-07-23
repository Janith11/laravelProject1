<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\SessionHour;
use App\VehicleCategory;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class VehicleCategoryController extends Controller
{
    public function index(){
        $categories = VehicleCategory::with('sessionhours')->get();
        return view('owner.vehicle_category.categorylist', compact('categories'));
    }

    public function add(){
        return view('owner.vehicle_category.addcategory');
    }

    public function savecategory(Request $request){

        $this->validate($request,[
            'theory_session' => 'required',
            'practicle_session' => 'required',
        ]);

        $vahicle_category = [
            'category_code' => $request->category_code,
            'name' => $request->category_name,
            'transmission' => $request->transmission
        ];

        $category = VehicleCategory::create($vahicle_category);

        $session_days = [
            'theory' => $request->theory_session,
            'practicle' => $request->practicle_session
        ];

        foreach ($session_days as $key => $value) {
            $rows = [
                'category_id' => $category->id,
                'session_type' => $key,
                'total_days' => $value
            ];
            $session = SessionHour::create($rows);
        }

        return redirect()->route('vehiclecategory')->with('successmsg', 'Category added Successfully !!');

    }

    public function editcategory($id){
        $results = VehicleCategory::where('id', $id)->with('sessionhours')->get();
        return view('owner.vehicle_category.editcategory', compact('results'));
        // return $results;
    }

    public function update_category(Request $request){
        $this->validate($request, [
            'category_code' => 'required',
            'category_name' => 'required',
            'theory_session' => 'required',
            'practicle_session' => 'required',
        ]);

        $id = $request->id;
        $update_category = VehicleCategory::find($id);
        $update_category->category_code = $request->category_code;
        $update_category->name = $request->category_name;
        $update_category->base_type = $request->base_type;
        $update_category->save();

        $sessionhours = SessionHour::where('category_id', $id)->get();
        $sessionday_id = [];
        foreach ($sessionhours as $hour) {
            $sessionday_id[] = $hour->id;
        }
        $session_days = [
            'theory' => $request->theory_session,
            'practicle' => $request->practicle_session
        ];

        $i = 0;
        foreach ($session_days as $key => $value) {
            $day = SessionHour::find($sessionday_id[$i]);
            $day->category_id = $id;
            $day->session_type = $key;
            $day->total_days = $value;
            $day->save();
            $i += 1;
        }


        // return value($session_days);
        return redirect()->route('vehiclecategory')->with('successmsg', 'Category Updated Successfully !!');

    }

    public function delete_category($id){
        VehicleCategory::find($id)->delete();
        $session_days = SessionHour::where('category_id', $id)->get();
        $session_id = [];
        foreach ($session_days as $day) {
            $session_id[] = $day->id;
        }
        foreach ($session_id as $s_id) {
            SessionHour::find($s_id)->delete();
        }
        return redirect()->route('vehiclecategory')->with('successmsg', 'Category Removed Successfully !!');
    }

}
