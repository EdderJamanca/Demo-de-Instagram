<?php

namespace App\Http\Controllers\posts;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class postsController extends Controller
{
    public function index()
    {
        return view('posts.createPosts');
    }

    public function store(Request $request)
    {

        // dd('probando');

        $this->validate($request,[
            "titulo"=>"required|min:3",
            "imagen"=>"required|string",
            "descripcion"=>"required|string"
        ]);

        Post::create([
            "titulo"=>$request->titulo,
            "descripcion"=>$request->descripcion,
            "imagen"=>$request->imagen,
            "user_id"=>auth()->user()->id
        ]);

        return redirect()->route('dash',auth()->user()->username);
    }

    public function show(User $user,Post $post)
    {
        return view('posts.showPost',['post'=>$post,"user"=>$user]);
    }

    public function delete(Post $post){

        Gate::authorize('delete',$post);

        if($post->comentarios->count()>0)
        {
            Comentario::where("post_id",$post->idpost)->delete();
        }
        // dd($post->comentarios->count());
        $post->delete();

        $posts=Post::where('user_id',auth()->user()->id)->get();

        return view('posts.dash',['user'=>auth()->user(),'posts'=>$posts]);
    }
}
