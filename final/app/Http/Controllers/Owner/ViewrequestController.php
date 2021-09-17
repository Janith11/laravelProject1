<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\User;
use App\StudentCategory;
use App\Student;
use App\Exam;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class ViewrequestController extends Controller
{
    public function index(){
        $requests=User::where('role_id',4)->where('status',1)->get();
        return view('owner.requests.viewrequest',compact('requests'));
    }
    public function get($id){
        $registration=User::where('id',$id)->get();
        $category=StudentCategory::where('user_id',$id)->get();
        return view('owner.requests.reviewrequest',compact('registration','category'));
    }
    public function accept(Request $request, $id){
        
        $this->validate($request,[
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'nicnumber' => 'required',
            // 'email' => 'required',
            'gender' => 'required',
            'contactnumber' => 'required',
            'birthday' => 'required|date',
            'addressnumber' => 'required',
            'addressstreatname' => 'required',
            'addresscity' => 'required',
            'price' => 'required',
            'totalsession' => 'required'
        ]);
            //get ids from .env
            $sid    = getenv("TWILIO_SID");
            $token  = env("TWILIO_AUTH_TOKEN");
            $from   = env("TWILIO_NUMBER");  

            $user = User::find($id);

            $user->f_name = $request->firstname;
            $user->role_id = 3;
            $user->m_name = $request->middlename;
            $user->l_name = $request->lastname;
            $user->nic_number = $request->nicnumber;
            // $user->email = $request->email;
            $user->gender = $request->gender;
            $user->contact_number = $request->contactnumber;
            $user->dob = $request->birthday;
            $user->address_no = $request->addressnumber;
            $user->address_lineone = $request->addressstreatname;
            $user->address_linetwo = $request->addresscity;
            $user->profile_img = 'default_profile.jpg';
            $user->save();

            $student = Student::create([
                'user_id' => $user->id,
                'paid_amount' => 0,
                'total_fee' => $request->price,
                'completed_session'=>0,
                'total_session'=>$request->totalsession,
                'group_number'=>$request->groupnumber,
            ]);
            $exams=Exam::create([
                'user_id'=>$user->id,
                'type'=> 'theory',
                'result'=>'none',
                'attempt'=>1
            ]);
            $exams=Exam::create([
                'user_id'=>$user->id,
                'type'=> 'practical',
                'result'=>'none',
                'attempt'=>1
            ]);
            if($user->gender == 'male'){
                Message::create([
                    'from'=>1,
                    'to'=> $user->id,
                    'has_read'=>0,
                    'text'=>'Congratulations Sir on joining our driving school! We look forward to sharing to many successes!'
                ]);
            }else{
                Message::create([
                    'from'=>1,
                    'to'=> $user->id,
                    'has_read'=>0,
                    'text'=>'Congratulations Madam on joining our driving school! We look forward to sharing to many successes!'
                ]);
            }
                Message::create([
                    'from'=>1,
                    'to'=> $user->id,
                    'has_read'=>0,
                    'text'=>'Welcome to the Driving School chat system. We are hoping to share your difficulties and other requirement with here. Our administration willing to help you. Do not be shy drop a message here.'
                ]);
                Message::create([
                    'from'=>1,
                    'to'=> $user->id,
                    'has_read'=>0,
                    'text'=>'You can schedule the time table with your free time. Good luck in your future career. Thank You!'
                ]);

                //sending sms user account is activated
                //user number convert to international number onlu for Sri Lanka p:)
                $Co_number =$user->contact_number;
                $str = ltrim($Co_number, $Co_number[0]);
                $International_No = "+94".$str;
    
                try {
                
                    $twilio = new Client($sid, $token);
                    $message = $twilio->messages
                        ->create($International_No, // to
                                array(
                                    "body" => "Hello, ".$user->f_name." ".$user->l_name.". Your Account is activated by Administration. Now you can continue your lessons. Thank You. \n-Driving School Management System- .",
                                    "from" => $from
                                )
                        );
        
                    }catch (Exception $e) {
                        dd("Error: ". $e->getMessage());
                    }
             return redirect()->route('viewrequest')->with('successmsg', 'Student Registered Successfully !');
    }

        public function decline(Request $request,$id){
            $user = User::find($id);
            $user->status = 0;
            $user->save();

             //user number convert to international number onlu for Sri Lanka p:)
             $Co_number =$user->contact_number;
             $str = ltrim($Co_number, $Co_number[0]);
             $International_No = "+94".$str;
 
             try {
             
                 $twilio = new Client($sid, $token);
                 $message = $twilio->messages
                     ->create($International_No, // to
                             array(
                                 "body" => "Hello, ".$user->f_name." ".$user->l_name.". Your request deleted by Administration. Contact us for more details. Thank You. \n-Driving School Management System- .",
                                 "from" => $from
                             )
                     );
     
                 }catch (Exception $e) {
                     dd("Error: ". $e->getMessage());
                 }
            return redirect()->route('viewrequest')->with('successmsg', 'Student Request is deleted Successfully !');
        }
        public function viewdeleterequests(){
            $deleterequests =User::where([
                ['role_id',4],
                ['status',0],
                ])->get();
            return view('owner.requests.viewdeletedrequests',compact('deleterequests'));
        }
        public function restorerequest(Request $request,$userid){
            $user = User::find($userid);
            $user->status = 1;
            $user->save();
            return redirect()->route('viewrequest')->with('successmsg', 'Student is restorted Successfully !');
        }
        public function deleterequest($id){
            StudentCategory::where('user_id',$id)->delete();
            User::find($id)->delete();
            return redirect()->route('viewdeleterequests')->with('successmsg', 'Student request is deleted Completely !');
        }

}
