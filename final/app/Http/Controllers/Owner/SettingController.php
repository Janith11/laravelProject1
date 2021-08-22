<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\OpenHour;
use App\Rules\MatchOldPassword;
use App\ShedulingType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $details = CompanyDetails::all();
        $open_hours = OpenHour::all();
        $shedulingtype = ShedulingType::first();
        $type =  $shedulingtype->type;
        $owners = User::where('id', 1)->get();
        return view('owner.settings.settings', compact('details', 'open_hours', 'type', 'owners'));
    }

    public function savedetails(Request $request){

        $company_details = CompanyDetails::first();

        $company_details->company_name = $request->c_name;
        $company_details->contact_number = $request->c_contact_number;
        $company_details->email = $request->c_email;
        $company_details->address_no = $request->address_no;
        $company_details->address_lineone = $request->address_lineone;
        $company_details->address_linetwo = $request->address_linetwo;
        $company_details->save();

        return redirect()->route('settings')->with('successmsg', 'Update details successfully !!');

    }

    public function saveopenhours(Request $request){

        // $openhours = OpenHour::
        $monday_from = $request->monday_from;
        $monday_to = $request->monday_to;

        $tuesday_from = $request->tuesday_from;
        $tuesday_to = $request->tuesday_to;

        $wednesday_from = $request->wednesday_from;
        $wednesday_to = $request->wednesday_to;

        $thursday_from = $request->thursday_from;
        $thursday_to = $request->thursday_to;

        $friday_from = $request->friday_from;
        $friday_to = $request->friday_to;

        $saturday_from = $request->saturday_from;
        $saturday_to = $request->saturday_to;

        $sunday_from = $request->sunday_from;
        $sunday_to = $request->sunday_to;

        $values = [
            1 => [$monday_from, $monday_to],
            2 => [$tuesday_from, $tuesday_to],
            3 => [$wednesday_from, $wednesday_to],
            4 => [$thursday_from, $thursday_to],
            5 => [$friday_from, $friday_to],
            6 => [$saturday_from, $saturday_to],
            7 => [$sunday_from, $sunday_to],
        ];

        foreach ($values as $key => $value) {
            $hour = OpenHour::find($key);
            $hour->weekday_id = $key;
            $hour->from = $value[0];
            $hour->to = $value[1];
            $hour->save();
        }

        return redirect()->route('settings')->with('successmsg', 'Update open hours successfully !!');

    }

    public function savelogo(Request $request){

        $this->validate($request, [
            'c_logo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('c_logo')) {

            $files = $request->file('c_logo');

            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();
            $files->move(public_path('/uploadimages/company_logo/'), $imagename);

            // save in database
            $company_details = CompanyDetails::first();
            $company_details->logo = $imagename;
            $company_details->save();

            return redirect()->route('settings')->with('successmsg', 'Update logo successfully !!');
        }

        return back()->with('error', 'Cannot upload logo !!');

    }


    public function changeshedulingtype(Request $request){

        $type = ShedulingType::first();
        $type->type = $request->shedule_type;
        $type->save();

        return redirect()->route('settings')->with('successmsg', 'Update Sheduling type successfully !!');
    }

    public function saveprofiledetails(Request $request){
        $this->validate($request, [
            'first_name' => 'required|min:5|alpha',
            'middle_name' => 'required|min:5|alpha',
            'last_name' => 'required|min:5|alpha',
            'nic_number' => 'required|digits:9|alpha_num',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'mobile_number' => 'required|digits:10|alpha_num',
            'address_no' => 'required',
            'address_line_one' => 'required|alpha',
            'address_line_two' => 'required|alpha',
        ]);

        $instructor_id = 1;
        $instructor = User::find($instructor_id);
        $instructor->f_name = $request->first_name;
        $instructor->m_name = $request->middle_name;
        $instructor->l_name = $request->last_name;
        $instructor->email = $request->email;
        $instructor->nic_number = $request->nic_number;
        $instructor->gender = $request->gender;
        $instructor->contact_number = $request->mobile_number;
        $instructor->dob = $request->date_of_birth;
        $instructor->address_no = $request->address_no;
        $instructor->address_lineone = $request->address_line_one;
        $instructor->address_linetwo = $request->address_line_two;
        $instructor->save();

        return redirect()->route('settings')->with('successmsg', 'Profile Update Successfully !!');
    }

    public function updateprofilepicture(Request $request){
        $folderPath = public_path('uploadimages/owner_profile/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath.$imageName;

        file_put_contents($imageFullPath, $image_base64);

        $instructor_id = 1;
        $profileimage = User::find($instructor_id);
        $profileimage->profile_img = $imageName;
        $profileimage->save();

        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }

    public function password(){
        return view('owner.settings.changepassword');
    }

    public function store(Request $request){
        // return 'hi';

        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:8',
            're_enter_password' => ['same:new_password'],
            // |min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$|confirmed
        ]);

        $instructor_id = 1;

        $instructor = User::find($instructor_id);
        $instructor->password = Hash::make($request->new_password);
        $instructor->save();

        return redirect()->route('settings')->with('successmsg', 'Password Change Successfully !!');

    }

}
