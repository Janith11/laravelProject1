<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\StudentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Auth::check() && Auth::user()->role->id == 1){
            $this->redirectTo = route('owner.ownerdashboad');
        }elseif (Auth::check() && Auth::user()->role->id == 2){
            $this->redirectTo = route('instructor.instructordashboad');
        }elseif (Auth::check() && Auth::user()->role->id == 3){
            $this->redirectTo = route('student.studentdashboad');
        }else{
            $this->redirectTo = route('candidate.candidatedashboard');
        }
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    // protected function validator(Request $data)
    {

        // $selected_category = $data['vehicle_category'];
        // $test=[];
        // foreach ($selected_category as  $category) {
        //     $row =[];
        //     if(($category == 'B1') || ($category == 'C')) {
        //         $row[$category] = [ $data[$category], 3 ];
        //     }
        //     else{
        //         $row[$category] = [ $data[$category], $data["trans".$category]  ];
        //     }
        //     array_push($test,$row);
        // }
        //  dd($test->category_code);
    //    dd($data);
        return Validator::make($data, [
            // // 'name' => ['required', 'string', 'max:255'],
            // // 'username' => ['required', 'string', 'max:255', 'unique:users'],
             'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nicnumber' => ['required', 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:7'],
            'contactno' => ['required','max:15'],
            'birthday' => ['required', 'string','date','max:255'],
            'addressno' => ['required', 'string', 'max:255'],
            'addresslineone' => ['required', 'string', 'max:255'],
            'addresslinetwo' => ['required', 'string', 'max:255'],
        ]);

    }

    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'role_id' => 4,
            'f_name' => $data['firstname'],
            'm_name' => $data['middlename'],
            'l_name' => $data['lastname'],
            // 'username' => str_slug($data['username']),
            'email' => $data['email'],
            'nic_number' => $data['nicnumber'],
            'gender' => $data['gender'],
            // 'gender' => 'female',
            'contact_number' => $data['contactno'],
            'dob' => $data['birthday'],
            'address_no' => $data['addressno'],
            'address_lineone' => $data['addresslineone'],
            'address_linetwo' => $data['addresslinetwo'],
            'profile_img' => 'default_profile.jpg',
            'status' => 1,
            'password' => Hash::make($data['password']),

        ]);
        // $user->student = Student::create([
        //     'user_id' => $user->id,
        //     'amount'=>0,
        //     'total_fee'=>0,
        // ]);
        
        $selected_category = $data['vehicle_category'];
        $test=[];
        foreach ($selected_category as  $category) {
            $row =[];
            if(($category == 'B1') || ($category == 'C')) {
                $row[$category] = [ $data[$category], "3" ];
            }
            else{
                $row[$category] = [ $data[$category], $data["trans".$category]  ];
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
       
        return $user;
    }
}
