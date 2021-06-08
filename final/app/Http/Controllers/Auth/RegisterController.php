<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
        }else{
            $this->redirectTo = route('student.studentdashboad');
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
            // 'name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:255', 'unique:users'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nicnumber' => ['required', 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:7'],
            'contactnumber' => ['required', 'integer', 'max:15'],
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
        return User::create([
            'role_id' => 3,
            'f_name' => $data['firstname'],
            'm_name' => $data['middlename'],
            'l_name' => $data['lastname'],
            // 'username' => str_slug($data['username']),
            'email' => $data['email'],
            'nic_number' => $data['nicnumber'],
            'gender' => $data['name'],
            'contact_number' => $data['contactnumber'],
            'address_no' => $data['addressno'],
            'address_lineone' => $data['addresslineone'],
            'address_linetwo' => $data['addresslinetwo'],
            'profile_img' => 'null',
            'status' => 1,
            'password' => Hash::make($data['password']),

        ]);
    }
}
