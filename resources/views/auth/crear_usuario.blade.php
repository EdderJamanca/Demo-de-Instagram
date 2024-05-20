@extends('layouts.app')

@section('tile')
  Registrar En DevStagram
@endsection

@section('contenido')
    <div class="flex gap-4 justify-between">
        <div class="flex justify-center p-5">
            <img
              class="w-full rounded-xl h-[70vh]"
              src="{{asset('img/registrar.jpg')}}" alt="imagen de registro">
        </div>
        {{-- iniciar el formulario de registro --}}
          <form
            action="{{route('store.registrar')}}"
            method="Post"
            class="bg-slate-900 md:w-4/12 p-6 rounded-lg">
             @csrf
             <h2 class="text-gray-400 font-bold text-center">REGISTRAR USUARIO</h2>
              @if(session('mensajeRegistro'))
              <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{session('mensajeRegistro')}}</p>
              @endif
            <div
              class="space-y-2 mb-3"
             >
                <label
                    for="nombre"
                    class="font-bold block uppercase  text-gray-600"
                >
                    Nombre:
                </label>
                <input
                    name="nombre"
                    class="w-full p-2 border rounded-md
                       text-gray-400
                       bg-gray-700
                       border-gray-600
                       focus:border-indigo-950
                       active:border-indigo-800
                       @error('nombre') border-red-700 @enderror"
                    placeholder="Ingrese su nombre"
                    autocomplete="off"
                 type="text">
                 @error('nombre')
                    <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                 @enderror
            </div>

            <div class="space-y-2 mb-3">
                <label for="usename" class="font-bold block uppercase text-gray-600">User Name:</label>
                <input
                    name="username"
                    type="text"
                    class="w-full text-gray-400 p-2 rounded-md
                    border bg-gray-700  border-gray-600
                    facus:border-indigo-950
                    active:border-indigo-800
                    @error('username') border-red-700 @enderror
                    "
                    placeholder="Ingrese su username"
                />

                @error('username')
                    <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                @enderror

            </div>
            <div class="space-y-2 mb-3">
                <label for="email" class="text-gray-600 block font-bold">Email:</label>
                <input
                    name="email"
                    type="email"
                    class="w-full text-gray-400 p-2 rounded-md
                    border bg-gray-700  border-gray-600
                    facus:border-indigo-950
                    active:border-indigo-800
                    @error('email')
                        border-red-700
                    @enderror
                    "
                    placeholder="Ingrese tu Email"
                />
                @error('email')
                    <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                @enderror
            </div>
            <div class="space-y-2 mb-3">
                <label for="password" class="text-gray-600 block font-bold">Contraseña:</label>
                <input
                    name="password"
                    type="password"
                    class="w-full text-gray-400 p-2 rounded-md
                    border bg-gray-700  border-gray-600
                    facus:border-indigo-950
                    active:border-indigo-800
                    @error('password')
                      border-red-700
                    @enderror
                    "
                    placeholder="Ingrese su Contraseña"

                />
                @error('password')
                    <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                @enderror
            </div>
            <div class="space-y-2 mb-3">
                <label for="password_recoveri" class="text-gray-600 block font-bold">Confirmar Contraseña:</label>
                <input
                    name="password_recoveri"
                    type="password"
                    class="w-full text-gray-400 p-2 rounded-md
                    border bg-gray-700  border-gray-600
                    facus:border-indigo-950
                    active:border-indigo-800"
                    @error('password_recoveri')
                        border-red-700
                    @enderror
                    placeholder="Confirmar contraseña"
                />
                @error('nombre')
                    <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <button
                type="submit"
                class="w-full
                py-2 block rounded-xl text-white
                bg-indigo-800 hover:bg-indigo-700">Registrar Usuario</button>
            </div>


          </form>
        {{-- fin el formulario de registro --}}
    </div>
@endsection
