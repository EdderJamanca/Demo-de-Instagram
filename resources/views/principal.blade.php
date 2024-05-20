@extends('layouts.app')

@section('title')
  Pagina Principal
@endsection

@section('contenido')
     @if ($posts->count()>0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($posts as $post )
                <div>
                    <a href="{{route('showpost',['post'=>$post,'user'=>$post->user])}}">
                        <img src="{{asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                    </a>
                </div>
            @endforeach
        </div>
     @else
        <p class="text-2xl text-center">No Hay Publicaciones</p>
     @endif

@endsection
