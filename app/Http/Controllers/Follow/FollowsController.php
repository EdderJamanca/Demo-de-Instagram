<?php

namespace App\Http\Controllers\Follow;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowsController extends Controller
{
    //

    public function store(User $user)
    {
        $user->follows()->attach(auth()->user()->id);

        return back();
    }

    public function delete(User $user){

        $user->follows()->detach(auth()->user()->id);
        return back();
    }
}
