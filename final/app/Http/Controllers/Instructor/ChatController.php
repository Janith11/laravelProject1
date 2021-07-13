<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NewMessage;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index(){
        return view('instructor.chat.instructorchat');
    }

    public function get(){
        $contacts =User::where('id', '!=', auth()->id())->get();
        // $contacts = User::all();
        return response()->json($contacts);
        // dump($contacts);
    }

    public function getMessagesFor($id){
        $messages =Message::where('from', $id)->orWhere('to',$id)->get();
        return response()->json($messages);
    }

    public function send(Request $request){
        
        $message=Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);
        
        // dump($message);
        // broadcast(new NewMessage($message));

        // return response()->json($message);

        broadcast(new NewMessage($message));
        return response()->json($message);
    }
}
