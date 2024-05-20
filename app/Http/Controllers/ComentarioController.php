<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function store(Request $request,User $user, Post $post)
    {

        $this->validate($request,[
            "comentario"=>'required|min:3'
        ]);

        Comentario::create([
            "comentario"=>$request->comentario,
            "user_id"=>$user->id,
            "post_id"=>$post->idpost
        ]);

        return back()->with("mensaje","Comentario registrado correctamente");

    }
}
