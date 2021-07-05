<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::with('user')->get();
        return view('instructor.posts.allposts', compact('posts'));
    }

    public function createposts(){
        return view('instructor.posts.createpost');
    }

    public function savepost(Request $request){
        $this->validate($request, [
            'post' => 'required|min:50',
        ]);

        $id = Auth::user()->id;

        $post = Posts::create([
            'user_id' => $id,
            'message' => $request->post
        ]);

        return redirect()->route('instructorpostlist')->with('successmsg', 'Post create successfully !!');
    }

    public function editposts($id, $user_id){
        if ($user_id == 1) {
            return back()->with('errormsg', 'You cannot edit this post !!');
        }else{
            $posts = Posts::where('id', $id)->get();
            $message = '';
            foreach ($posts as $post) {
                $message = $post->message;
            }
            return view('instructor.posts.editpost', compact('posts', 'message'));
        }
    }

    public function updatepost(Request $request){
        $this->validate($request, [
            'post' => 'required|min:50',
        ]);

        $id = $request->id;
        $post = $request->post;
        $p = Posts::find($id);
        $p->message = $post;
        $p->save();

        return redirect()->route('instructorpostlist')->with('successmsg', 'Update post successfully !!');
    }

    public function deletepost($id, $user_id){
        if ($user_id == 1) {
            return back()->with('errormsg', 'You cannot delete this post !!');
        }else{
            $post = Posts::find($id);
            $post->delete();
            return redirect()->route('instructorpostlist')->with('successmsg', 'Post delete successfully !!');
        }
    }
}
