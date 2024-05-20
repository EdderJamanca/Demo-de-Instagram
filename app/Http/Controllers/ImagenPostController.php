<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
// use Intervention\Image\Laravel\Facades\Image;
// use Intervention\Image\ImageManager;
// use Intervention\Image\ImageManagerStatic as Image;


class ImagenPostController extends Controller
{
    //
    public function store(Request $request)
    {
        // obtenemos el archivo enviado
        $imagen=$request->file('file');
        // formamos el nombre con su extenciio por defecto
        $nombre=Str::uuid().'.'.$imagen->extension();
        // se realiza una copia de la imagen utilizando
        $imagenServidor= Image::make($imagen);
        // defenimos el tamaño de la imaen
        $imagenServidor->fit(1000,1000);
        // // armamos la ruta donde se va alojar le url
        $imagenPath=public_path('uploads').'/'.$nombre;
        // //se guardara en la carpeta
        $imagenServidor->save($imagenPath);

        return response()->json(["imagen"=>$nombre]);
    }
}
