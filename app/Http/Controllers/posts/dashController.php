<?php

namespace App\Http\Controllers\posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashController extends Controller
{
    //


    public function index(User $user)
    {
        // dd(auth()->user()->id);
        $posts=Post::where('user_id',auth()->user()->id)->get();
        return view('posts.dash',[
            'user'=>$user,
            'posts'=>$posts
        ]);
    }
}
