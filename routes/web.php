<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenPostController;
use App\Http\Controllers\Likes\LikeController;
use App\Http\Controllers\posts\dashController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\posts\postsController;
use App\Http\Controllers\Auth\RegistrarController;
use App\Http\Controllers\Follow\FollowsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeController::class)->name('home');

// Route::group(
//     ["prefix"=>"auth"],
//     function(){
//      Route::get('/crear-cuenta')
// })
// registro de usuario
Route::get('/crear-cuenta',[RegistrarController::class,'index'])->name('registrar');
Route::post('/crear-cuenta',[RegistrarController::class,'store'])->name('store.registrar');
Route::get('/show/{user:username}',[RegistrarController::class,'show'])->name('show.usuario');
Route::get('/verificar/{token_registro}',[RegistrarController::class,'verificar']);
Route::put('/editar',[RegistrarController::class,'update'])->name('editar.perfil');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'logout'])->name('logout');


Route::get('/posts/create',[postsController::class,'index'])->name('createposts');
Route::post('/posts/create',[postsController::class,'store'])->name('registerposts');
Route::get('/{user:username}/post/{post}',[postsController::class,'show'])->name('showpost');

Route::delete('/post/{post}',[postsController::class,'delete'])->name('eliminarpost');

Route::post('/{user:username}/post/{post}',[ComentarioController::class,'store'])->name('registrarcomentario');

Route::get('/{user:username}',[dashController::class,'index'])->name('dash');

Route::post('/imagenSave',[ImagenPostController::class, 'store']);

// ======================================
//          LIKES
// ======================================

Route::post('/like/{post}',[LikeController::class,'store'])->name('store.like');
Route::delete('/like/{post}',[LikeController::class,'delete'])->name('delete.like');
// ======================================
//          FOLLOWS
// ======================================
Route::post('/follows/{user}',[FollowsController::class,'store'])->name('store.follow');
Route::delete('/follows/{user}',[FollowsController::class,'delete'])->name('delete.follow');
