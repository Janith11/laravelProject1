<?php

namespace App\Http\Controllers\Owner;

use App\CompanyDetails;
use App\Http\Controllers\Controller;
use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Posts::with('user')->get();
        return view('owner.post.allpost', compact('posts'));
    }

    public function makeposts(){
        return view('owner.post.createpost');
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

        return redirect()->route('allposts')->with('successmsg', 'Post create successfully !!');

    }

    public function deletepost($id){
        $post = Posts::find($id);
        $post->delete();
        return redirect()->route('allposts')->with('successmsg', 'Delete post successfully !!');
    }

    public function editpost($id){
        $posts = Posts::where('id', $id)->get();
        $message = '';
        foreach ($posts as $post) {
            $message = $post->message;
        }
        return view('owner.post.editpost', compact('posts', 'message'));
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

        return redirect()->route('allposts')->with('successmsg', 'Update post successfully !!');
    }
}
