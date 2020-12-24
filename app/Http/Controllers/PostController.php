<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::paginate(20);
        $likes = new like();
        return view('posts.index', ['posts'=>$post, 'likes'=>$likes]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'body'=>'required'
        ]);

        $request->user()->posts()->create([
            'body'=> $request->body
        ]);
        return back();
    }
}
