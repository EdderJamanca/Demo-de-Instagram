@extends('layouts.app')

 @section('title')
     <h2 class="text-2xl font-bold text-gray-600 text-center"> Editar Perfil</h2>
 @endsection

 @section('contenido')
 <div class="flex justify-center mt-2">

     <form
        action="{{route('editar.perfil')}}"
        method="post"
        enctype="multipart/form-data"
        class="bg-slate-900 w-4/12 rounded-lg px-10 py-2">
        @csrf
        @method('PUT')
         <div class="space-y-2 mb-3">
             <label for="username" class="font-bold block text-gray-600">USERNAME:</label>
             <input
             type="text"
             class="w-full p-2 border rounded-md
             text-gray-400
             bg-gray-700
             focus:border-indigo-950
             active:border-indigo-800"
             value="{{auth()->user()->username}}"
             name="username"/>
         </div>

         <div class="space-y-2 mb-3">
             <label for="imagen" class="font-bold block text-gray-600">IMAGEN:</label>
             <input
             type="file"
             class="w-full p-2 border rounded-md
             text-gray-400
             bg-gray-700
             focus:border-indigo-950
             active:border-indigo-800"
             accept=".jpg,png,gif"
             name="imagen"/>
         </div>

         <div class="mb-3 flex justify-center">
             <button type="submit" class="bg-yellow-400 w-full font-bold text-white hover:bg-yellow-600 rounded-xl py-2 px-3">ACTUALIZAR</button>
         </div>
     </form>

 </div>
 @endsection
