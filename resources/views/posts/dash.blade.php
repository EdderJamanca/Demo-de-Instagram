@extends('layouts.app')

@section('title')
<div class="flex justify-center items-center">
    <p class="uppercase"><span class="font-bold">Perfil:</span> {{auth()->user()->username}}</p>
    @auth
      @if($user->id==auth()->user()->id)´
        <a href="{{route('show.usuario',["user"=>auth()->user()->username])}}" class="h-5 mx-5 cursor-pointer"><img class="h-5" src="{{asset('img/icon/editar.png')}}" alt=""></a>
      @endif
    @endauth
</div>
@endsection

@section('contenido')

    <div class="flex w-full md:justify-center flex-col items-center md:flex-row">
        {{-- imagen del usuario  --}}
        <div class="mb-3 md:mb-0 w-4/12 justify-center h-[25vh]">
            <img class=" block h-[25vh] bg-cover rounded-2xl w-[20vw]" src="{{$user->imagen ? asset('perfil/'.$user->imagen) : asset('img/usuario.svg')}}" alt="logo usuario"/>
        </div>
        {{-- datos de imagen --}}
        <div class="w-full justify-center md:w-5/12 md:items-center">
            <div class="mx-10">
                <h2 class="uppercase font-bold mb-4">{{auth()->user()->username}}</h2>
                <p class=" uppercase font-bold mb-4">
                    {{$user->follows->count()}} <span class="font-bold">@choice('Seguidor|Seguidores',$user->follows->count())</span>
                </p>
                <p class="uppercase font-bold mb-4">
                    {{$user->followins->count()}} <span class="font-bold">Siguiendo</span>
                </p>
                <p class=" uppercase font-bold mb-4">
                    {{$posts->count()}} <span class="font-bold">Post</span>
                </p>
                @auth
                    @if($user->id != auth()->user()->id)
                        @if($user->siguiendo(auth()->user()))

                            <form action="{{route('delete.follow',$user)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-900 rounded-2xl px-3 py-2 text-white font-bold">
                                DEJAR SEGUIR
                                </button>
                            </form>
                        @else
                            <form action="{{route('store.follow',$user)}}" method="post">
                                @csrf
                                <button type="submit" class="bg-green-600 hover:bg-green-900 rounded-2xl px-3 py-2 text-white font-bold">
                                    SEGUIR
                                </button>
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>

    </div>

    {{-- seccion --}}
    <section class="container mx-auto mt-10">
        <h3 class="text-center text-4xl font-bold uppercase">Publicaciones</h3>
        @if ($posts->count())

            <div class="grid sm:grid-cols-2 md:grid-cols-5 xl:grid-cols-4 gap-6 mt-5 mx-5">
                @foreach ($posts as $post)
                    <div class="rounded-t-xl shadow-2xl" onclick="showPost($post,auth()->user()->username)">
                        <a href="{{route('showpost',['post'=>$post,'user'=>auth()->user()->username])}}" class="block">
                            <img
                                class="w-full rounded-t-xl"
                                src="{{asset('uploads').'/'.$post->imagen}}"
                                alt="{{$post->descripcion}}">
                            </a>
                            <p class="text-gray-900 text-center font-bold uppercase my-1">{{$post->titulo}}</p>
                        </div>
                @endforeach
            </div>

        @else
            <p class="uppercase  text-center font-bold text-xl">No hay Posts</p>
        @endif
    </section>

@endsection

@push('script')
    @vite('resources/js/post.js')
@endpush
