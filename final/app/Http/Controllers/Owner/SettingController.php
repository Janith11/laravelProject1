<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\OpenHour;
use App\ShedulingType;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function index(){
        $details = CompanyDetails::all();
        $open_hours = OpenHour::all();
        $shedulingtype = ShedulingType::first();
        $type =  $shedulingtype->type;
        return view('owner.settings.settings', compact('details', 'open_hours', 'type'));
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

}
