@extends('layouts.app')

@section('contenido')
    <div class="flex gap-4 justify-between items-center">
        <div class="flex justify-center p-5">
            <img
             class="w-full rounded-xl h-[70vh]"
             src="{{asset('img/login.jpg')}}" alt="imagen de login">
        </div>
        <form
            action="{{route('login')}}"
            method="POST"
            class="bg-slate-900 md:w-4/12 p-6 rounded-lg">
            @csrf
            <h2 class="text-gray-400 font-bold text-center">INICIAR SESSIÓN</h2>
            @if(session('mensaje'))
                <p class="bg-red-500
                        rounded-lg
                        text-sm
                        p-2 text-center
                        border-red-500
                        text-white my-2">
                        {{session('mensaje')}}
                </p>
            @endif
            <div class="space-y-2 mb-3">
                <label for="email" class="font-bold block uppercase text-gray-600">Email:</label>
                <input
                  type="email"
                  name="email"
                  class="w-full p-2 border rounded-md
                  text-gray-400
                  bg-gray-700
                  focus:border-indigo-950
                  active:border-indigo-800"
                  placeholder="Ingresa tu email"
                 />
            </div>
            <div class="space-y-2 mb-3">
                <label for="password" class="font-bold block uppercase text-gray-600">Contraseña:</label>
                <input
                  type="password"
                  name="password"
                  class="w-full p-2 border rounded-md
                  text-gray-400
                  bg-gray-700
                  focus:border-indigo-950
                  active:border-indigo-800"
                  placeholder="*******"
                 />
            </div>
            {{-- imput de mantener sesion --}}
            <div class="space-y-2 mb-3">
                <input type="checkbox"
                       name="remember"
                       id="remember"
                 />
                 <label
                    class="text-gray-200 text-sm cursor-pointer"
                   for="remember">Mantener mi sesión abierta</label>
            </div>

            <div class="space-y-2">
                <button type="submit" class="w-full rounded-xl text-white bg-indigo-800 hover:bg-indigo-700 py-2">INICIAR SESION</button>
            </div>
        </form>
    </div>
@endsection
