<?php

namespace App\Http\Controllers\Likes;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    //

    public function store(Post $post)
    {
        Like::create([
            "user_id"=>auth()->user()->id,
            "post_id"=>$post->idpost
        ]);

        return back();
    }

    public function delete(Post $post){
        Like::where([
            "user_id"=>auth()->user()->id,
            "post_id"=>$post->idpost
        ])->delete();

        return back();
    }
}
