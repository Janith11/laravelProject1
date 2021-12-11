<?php

namespace App\Http\Controllers\Instructor;

use App\AlertForStudent;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\OwnerShedule;
use App\Shedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;

        $alerts = AlertForStudent::with('shedulealert')->where('student_id', $user_id)->orderBy('created_at', 'DESC')->get();

        $shedule_ids = [];

        foreach ($alerts as $alert) {
            $shedule_ids[] = $alert->shedulealert->shedule_id;
        };

        $shedules = Shedule::whereIn('id', $shedule_ids)->get();

        $values = [];
        foreach($alerts as $alert){
            $value = [];
            foreach ($shedules as $shedule) {
                if ($alert->shedulealert->shedule_id == $shedule->id) {
                    $value['id'] = $alert->id;
                    $value['type'] = $alert->alert_status;
                    $value['message'] = $alert->shedulealert->message;
                    $value['time'] = $alert->created_at;
                    $value['session'] = $shedule->lesson_type;
                    $value['status'] = $shedule->shedule_status;
                    array_push($values, $value);
                }
            }
        }

        return view('instructor.alert.alert', compact('values'));
    }

    public function read(Request $request){
        $alert_id = $request->alert_id;
        $alert = AlertForStudent::find($alert_id);
        $alert->alert_status = 1;
        $alert->save();
        return redirect()->route('instrcutoralerts');
    }
}
