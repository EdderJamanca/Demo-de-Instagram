    @extends('layouts.app')
    @push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
        {{-- <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" /> --}}
        {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}

    @endpush


    @section('title')
        Crear Posts
    @endsection

    @section('contenido')
      <div class="w-full flex justify-center gap-2">
            <div class="w-1/2">
                <form
                enctype="multipart/form-data"
                action="/imagenSave"
                action="post"
                id="img_post"
                class="px-10 flex flex-col dropzone
                 w-full border-2 h-[47vh] rounded
                justify-center items-center">
                @csrf

                </form>
            </div>

            <div class="w-1/2">

                <form
                    action="{{route('registerposts')}}"
                    method="post"
                    class="px-10 py-10 bg-slate-900 rounded-lg">
                    @csrf

                    <div class="space-y-2 mb-3">
                        <label for="titulo" class="text-gray-200 font-bold uppercase">
                             titulo
                        </label>
                        <input
                          name="titulo"
                          type="text"
                          value="{{old('titulo')}}"
                          class="w-full rounded-lg p-2 mt-3 bg-gray-200 @error('titulo')
                                border-red-900
                          @enderror)"
                         />
                         @error('titulo')
                            <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                         @enderror
                    </div>
                    {{-- <input id="fileimagen" type="file" name="fileimagen"> --}}

                    <div class="space-y-2 mb-3">
                        <label for="descripcion" class="text-gray-200 font-bold uppercase">
                             Descripción
                        </label>
                        <textarea
                          value="{{old('descripcion')}}"
                          name="descripcion"
                          class="w-full rounded-lg p-2 mt-3 bg-gray-200 @error('descripcion')
                          border-red-900
                          @enderror"
                         ></textarea>
                         @error('descripcion')
                            <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                         @enderror
                    </div>

                    <div class="mb-5">
                        <input
                            id="urlimagen"
                            type="hidden"
                            name="imagen"
                            value="{{old('imagen')}}">
                        @error('imagen')
                            <p class="spce-y-1 bg-red-100 border-red-700 text-red-700 rounded-lg px-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <button
                        type="submit"
                        class="uppercase w-full text-white bg-indigo-900 py-2 rounded-xl hover:bg-indigo-700 my-4">
                        REGISTRAR
                    </button>
                    </div>
                </form>
            </div>
      </div>
    @endsection


    @push('script')
        {{-- <script src=""></script> --}}
        @vite('resources/js/ImagenPost.js')
    @endpush
