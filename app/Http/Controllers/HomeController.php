<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function __invoke()
    {
        // dd();
        $ids=auth()->user()->followins->pluck('id')->toArray();

        $posts=Post::whereIn('user_id',$ids)->paginate(10);

        return view('principal',['posts'=>$posts]);
    }
}
