@extends('layouts.app')

@section('title')
        <h2 class="text-center uppercase font-bold text-xl">{{$post->titulo}}</h2>
@endsection

@section('contenido')
    <div class="w-full flex flex-row">
        <div class="w-1/2">
            <div class="h-[50vh] flex justify-center">
                <img  class="h-[50vh] rounded-xl" src="{{asset('uploads').'/'.$post->imagen}}" alt="{{$post->descripcion}}">
            </div>
            <div class="p-3 mx-auto flex justify-start">
                @auth
                    @if ($post->user_id != auth()->user()->id)

                            @if($post->checkPost(auth()->user()))

                                <form
                                    action="{{route('delete.like',$post)}}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mr-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form
                                    action="{{route('store.like',$post)}}"
                                    method="post">
                                    @csrf
                                    <button type="submit" class="mr-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </button>
                                </form>
                            @endif

                    @endif
                @endauth
                <p>0 Likes</p>
            </div>
            <div class="mx-auto">
                <p class="font-bold">{{$user->username}}</p>
                <p class="text-sm">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
                @auth
                    @if ($post->user_id==auth()->user()->id)
                        <form action="{{route('eliminarpost',$post)}}" method="post" class="my-2">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-700 hover:bg-red-900 rounded-xl text-white px-3 py-2">Eliminar</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>

        <div class="w-1/2 ">
          @auth
                @if(session('mensaje'))
                    <p class="bg-green-500
                            rounded-lg
                            text-sm
                            p-2 text-center
                            border-green-500
                            text-white my-2">
                            {{session('mensaje')}}
                    </p>
                @endif
                <form
                    method="post"
                    action="{{route('registrarcomentario',["post"=>$post,"user"=>$user])}}"
                    class="flex gap-4 justify-between items-center flex-col bg-slate-900 px-10 rounded-2xl">
                    @csrf
                    <div class="mb-1 w-full mt-6">
                        <label for="comentario" class="text-white">Comentario</label>
                        <textarea name="comentario" class="w-full rounded-lg p-2 mt-3 bg-gray-200
                        @error('comentario') border-red-900 @enderror
                        "></textarea>
                    </div>
                    @error('comentario')
                        <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                    @enderror

                    <div class="mb-1 w-full">
                        <button type="submit" class="uppercase w-full text-white bg-indigo-900 py-2 rounded-xl hover:bg-indigo-700 my-4">registrar comentario</button>
                    </div>
                </form>
          @endauth
            <div >
                 <h2 class="font-bold text-2xl text-center">Comentarios</h2>
                @if ($post->comentarios->count())
                    @foreach($post->comentarios as $comentario)
                         <div class="mb-1 shadow-md">
                            <p>{{$comentario->comentario}}</p>
                            <p class="text-right text-sm text-gray-300">
                                <span> {{explode('-',explode(' ',$comentario->created_at)[0])[2]}}/{{explode('-', $comentario->created_at)[1]}}/{{ explode('-', $comentario->created_at)[0] }}</span></p>
                         </div>
                    @endforeach
                @else
                   <p class="text-indigo-600 text-center">No hay comentario</p>
                @endif

            </div>
        </div>
    </div>
    {{-- {{dd($post->comentarios())}} --}}
@endsection
