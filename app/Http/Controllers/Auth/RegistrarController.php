<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Events\ValidarRegistoUsuario;
use Intervention\Image\Facades\Image;

class RegistrarController extends Controller
{
    //

    public function index()
    {
        return view('auth.crear_usuario');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[
            "nombre"=>"required|min:3",
            "username"=>"required|unique:users|min:3|max:20",
            "email"=>"required|email",
            "password"=>"required|min:5",
            "password_recoveri"=>"required|same:password"
        ]);

            $user=new User();
            $user->nombre = $request->nombre;
            $user->username = Str::lower($request->username);
            $user->email = $request->email;
            $user->token_register = Uuid::uuid4()->toString();
            $user->password = Hash::make($request->password);
            $user->imagen='';

            try{
                $user->save();

                event(new ValidarRegistoUsuario($user));

                return view('auth/MensajeRegister');

            }catch(error){
                dd('dddsad');
                return back()->with('mensajeRegistro',"Ups, Hubo problemas en el registro, intentelo de nuevo dentro de unos minutos");
            }
    }

    public function verificar(string $token_registro)
    {
        // Encuentra el usuario por el token de registro
        $user = User::where('token_register', $token_registro)->first();

        // Si el usuario existe, actualiza el token_register a vacío
        if ($user) {
            $user->token_register = '';
            $user->save();
        }
        // Retorna la vista de login
        return view('auth.login');
    }

    public function show(User $user)
    {
        return view('auth.editar',$user);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            "username"=>["required","unique:users,username,".auth()->user()->id,"min:3","max:20"]
        ]);
        $nombre='';
        // dd($request->file('imagen'));
        if($request->file('imagen')){
            $imagen=$request->file('imagen');
            // formamos el nombre con su extenciio por defecto
            $nombre=Str::uuid().'.'.$imagen->extension();
            // se realiza una copia de la imagen utilizando
            $imagenServidor= Image::make($imagen);
            // defenimos el tamaño de la imaen
            $imagenServidor->fit(1000,1000);
            // // armamos la ruta donde se va alojar le url
            $imagenPath=public_path('perfil').'/'.$nombre;
            // //se guardara en la carpeta
            $imagenServidor->save($imagenPath);
        }

        User::where('id',auth()->user()->id)
        ->update(["username"=>$request->username,"imagen"=>$nombre]);

        $posts=Post::where('user_id',auth()->user()->id)->get();
        // dd($posts->user);
        $user=User::find(auth()->user()->id);
        // dd($user);

        return view('posts.dash',["posts"=>$posts,"user"=>$user]);
    }
}
