<?php

namespace App\Http\Controllers\Student;

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
        return view('student.chat.studentchathome');
    }

    public function get(){
        $contacts =User::where('id', '!=', auth()->id())->get();
        // dd($contacts);
        // get unread message
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
        ->where('has_read', false)
        ->groupBy('from')
        ->get();
       
        // $unreadIds = Message::where('to_id', auth()->id())->where('has_read', false)->get();
       

        $contacts = $contacts->map(function($contact) use ($unreadIds){
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread =  $contactUnread ?  $contactUnread->messages_count : 0;

            return $contact;
        });
        // $contacts = User::all();
        return response()->json($contacts);
        // dump($contacts);
    }

    public function getMessagesFor($id){
       //read message set stats as 1
       Message::where('from', $id)->Where('to', auth()->id())->update(['has_read'=> true]);

       $messages =Message::where(function($q) use ($id){
           $q->where('from',auth()->id());
           $q->where('to',$id);
       })->orWhere(function($q) use ($id){
           $q->where('from',$id);
           $q->where('to', auth()->id());
       })
       ->get();
       // dump($message);
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
