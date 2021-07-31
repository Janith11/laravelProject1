<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;
use App\Instructor;
use App\VehicleCategory;
use App\StudentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class IntructorsController extends Controller
{
    public function index(){
        $instructors = Instructor::with('user')->get();
        return view('owner.instructor.instructors', compact('instructors'));
    }
    public function addinstructor(){
        $vehicalcategory=VehicleCategory::all();
        return view('owner.instructor.addinstructor',compact('vehicalcategory'));
    }
    public function insertinstructor(Request $request){
        $this->validate($request,[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'nicnumber' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'contactnumber' => 'required',
            'addressnumber' => 'required',
            'addressstreatname' => 'required',
            'addresscity' => 'required',
            'birthday' => 'required|date',
            'vehicle_category'=>'required'
            ]);
        $user = User::create([
            'f_name' => $request->firstname,
            'm_name' => $request->middlename,
            'l_name' => $request->lastname,
            'nic_number' => $request->nicnumber,
            'email' => $request->email,
            'gender' => $request->gender,
            'contact_number' => $request->contactnumber,
            'address_no' => $request->addressnumber,
            'address_lineone' => $request->addressstreatname,
            'address_linetwo' => $request->addresscity,
            'dob' => $request->birthday,
            'password' => bcrypt('Instructor@2021'),
            'profile_img' => 'default_profile.jpg',
            'status' => 1,
            'role_id'=>2
            ]);

        $Instructor = Instructor::create([
            'user_id' => $user->id,
            ]);
        $selected_category = $request['vehicle_category'];
        $test=[];
        foreach ($selected_category as  $category) {
            $row =[];
            if(($category == 'B1') || ($category == 'C')) {
                $row[$category] = [ $request[$category], "3" ];
            }
            else{
                $row[$category] = [ $request[$category], $request["trans".$category]  ];
            }
            array_push($test,$row);
        }
        foreach($test as $value){
            foreach($value as $key=>$val1){
           
            $transmission = '';
            $trainig='';
            $count=0;
            foreach($val1 as $val2){
                if($count == 0){
                    $trainig =$val2;
                }else{
                    $transmission=$val2;
                }
                $count+=1;
            }
            $count = 0;
            StudentCategory::create([
                'user_id'=>$user->id,
                'category'=>$key,
                'tstatus'=>$trainig,
                'transmission'=>$transmission
            ]);
            }
        }
        return redirect()->route('insertinstructor')->with('successmsg', 'One Instructor is added successfuly !');
    }

    public function editinstructor($user_id){
        $Instructor = Instructor::where('user_id', '=',$user_id)->with('user')->get();
        return view('owner.instructor.editinstructor',compact('Instructor'));
    }
    public function updateinstructor(Request $request, $user_id){
        $this->validate($request,[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'nicnumber' => 'required',
            'gender' => 'required',
            'contactnumber' => 'required',
            'addressnumber' => 'required',
            'addressstreatname' => 'required',
            'addresscity' => 'required',
            'birthday' => 'required|date',
        ]);

            $user = User::find($user_id);


            $user->f_name = $request->firstname;
            $user->role_id = 2;
            $user->m_name = $request->middlename;
            $user->l_name = $request->lastname;
            $user->nic_number = $request->nicnumber;
            $user->gender = $request->gender;
            $user->contact_number = $request->contactnumber;
            $user->address_no = $request->addressnumber;
            $user->address_lineone = $request->addressstreatname;
            $user->address_linetwo = $request->addresscity;
            $user->dob = $request->birthday;

            $user->save();

            return redirect()->route('instructors')->with('successmsg', 'Instructor is updated successfuly !');
    }

}
