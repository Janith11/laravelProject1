<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\StudentCategory;
use App\RequestAlert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Exception;
use Twilio\Rest\Client;
use Illuminate\Http\Request;

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
    // edited Janith 
    protected $redirectTo='/Verify-your-phone/{id}';

    //overide by Janith redirect Path

    protected function redirectPath(){
        $uid=Auth::user()->id;
        return '/Verify-your-phone/'.$uid;
    }

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
      {
        return Validator::make($data, [
            // // 'name' => ['required', 'string', 'max:255'],
            // // 'username' => ['required', 'string', 'max:255', 'unique:users'],
             'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nicnumber' => ['required', 'string', 'max:12','unique:users,contact_number'],
            'gender' => ['required', 'string', 'max:7'],
            'contactno' => ['required','max:15','unique:users,contact_number'],
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
        //create a random otp
        $OTP= rand(100000,999999);
       
        //get ids from .env
        $sid    = getenv("TWILIO_SID");
        $token  = env("TWILIO_AUTH_TOKEN");
        $from   = env("TWILIO_NUMBER");  
       
        $user= User::create([
            'role_id' => 4,
            'f_name' => $data['firstname'],
            'm_name' => $data['middlename'],
            'l_name' => $data['lastname'],
            // 'username' => str_slug($data['username']),
            // 'email' => $data['email'],
            'nic_number' => $data['nicnumber'],
            'gender' => $data['gender'],
            // 'gender' => 'female',
            'contact_number' => $data['contactno'],
            'contact_no_isVerified'=>'0',//just test
            'otp' => $OTP,
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
        RequestAlert::create([
            'user_id'=>$user->id,
            'description'=>1, // Description 1 for registration 2 for schedules
            'status'=>0
        ]);
        //user number convert to international number onlu for Sri Lanka p:)
        $Co_number =$user->contact_number;
        $str = ltrim($Co_number, $Co_number[0]);
  	    $International_No = "+94".$str;
    
          try {
        
            $twilio = new Client($sid, $token);
            $message = $twilio->messages
                  ->create($International_No, // to
                           array(
                               "body" => "Hello ".$user->f_name." ".$user->l_name.". Welcome to the Driving School Management System. Your OTP is ".$OTP."\nThank you.",
                               "from" => $from
                           )
                  );
  
            }catch (Exception $e) {
                dd("Error: ". $e->getMessage());
            }
       
        return $user;
        // return redirect()->route('firstpage');
    }
}
