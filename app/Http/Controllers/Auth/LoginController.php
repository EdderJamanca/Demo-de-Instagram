<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->only('email','password'));
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','Email o Credenciales Incorrectas');
        }

        return redirect()->route('dash',[auth()->user()->username]);
    }
    // public function logout()
}
