<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dev Stagram </title>
    @stack('styles')
</head>
<body>
    <header class="p-5 flex justify-between items-center bg-slate-900">
        <a href="{{route('home')}}" class="text-3xl text-yellow-50 inline">
            DevStagram
        </a>

        @auth
            <nav class="flex gap-2 items-center">
                <a
                class="flex gap-2 border-1 hover:bg-indigo-600 hover:border-indigo-900
                        border cursor-pointer rounded-xl py-1 px-2 font-bold uppercase text-white"
                href="{{route('createposts')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                </svg>
                 Nuevo Post
                </a>
                <a  class="font-bold uppercase text-white text-sm"
                     href="{{route('dash',[auth()->user()->username])}}"
                    >Hola: <span class="font-normal">{{auth()->user()->username}}</span>
                </a>
                <form action="{{route('logout')}}" method="post">
                     @csrf
                     <button type="submit" class="font-bold uppercase text-gray-200 text-sm">Cerrar Sesion</button>
                </form>
            </nav>
        @endauth
        @guest
            <nav class="flex gap-2 items-center">
                <a
                    class="flex gap-2  border-red-2
                            hover:bg-indigo-600 hover:border-indigo-900
                            text-white
                            border-2 cursor-pointer rounded-xl py-1 px-2"
                    href="{{route('login')}}">
                    Login
                </a>
                <a
                class="border-2 flex gap-2 rounded-xl py-1 px-2
                    hover:bg-indigo-600 hover:border-indigo-900
                text-white"
                href="{{route('registrar')}}">
                    Crear Cuenta
                </a>
            </nav>
        @endguest
    </header>
    {{-- fin de header --}}
    <main class="container mx-auto mt-10">
        <h1 class="font-black text-center text-3xl mb-10 text-gray-400">
            @yield('title')
        </h1>
        <p class="text-gray-400">
            @yield('contenido')
        </p>
    </main>

    {{-- fin de contenido --}}
    <footer class="text-center p-5 text-gray-400 uppercase">
            DevTagram - Todos los derechos reservado
            {{now()->day}}/{{now()->month}}/{{now()->year}}
    </footer>
    @stack('script')
</body>
</html>
