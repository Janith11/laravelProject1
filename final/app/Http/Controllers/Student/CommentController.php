<?php

namespace App\Http\Controllers\Student;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $studentdetails = Student::with('user', 'studentcategories', 'exams', 'attendances')->where('user_id', $user_id)->get();
        return view('student.comment.comment', compact('studentdetails'));
    }

    public function savecomment(Request $request){
        $this->validate($request, [
            'comment' => 'required',
        ]);
        $stars = $request->rate;
        $user_id = Auth::user()->id;
        $comment = Comment::create([
            'user_id' => $user_id,
            'comment' => $request->comment,
            'stars' =>  $stars,
        ]);

        return redirect()->route('studentcomment')->with('succesmsg', 'Thank you, Your comment Successfully Added !!');
    }
}
