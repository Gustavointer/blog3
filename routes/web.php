<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ControllerPost;
use App\Http\Controllers\ContatoController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ControllerPost::class, 'home'])->name('home');

Route::get('/sobremim', function () {
    return view('sobre');
})->name('sobremim');


Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

Route::get('/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/login', [UsuarioController::class, 'login'])->name('login');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/usuario/inserir', [UsuarioController::class, 'create'])->name('usuario.inserir');

Route::post('/usuario/inserir', [UsuarioController::class, 'insert'])->name('usuario.inserir');

Route::get('/post/inserir', function () {
    return view('post.create');
})->name('post.inserir');

Route::post('/post/inserir', [ControllerPost::class, 'insert'])->name('post.insert');

Route::get('/post/{post}', [ControllerPost::class, 'index'])->name('post');

Route::get('/post/{post}/editar', [ControllerPost::class, 'edit'])->name('post.edit');

Route::put('/post/{post}/editar', [ControllerPost::class, 'update'])->name('post.update');

Route::any('/post/{post}/apagar', [ControllerPost::class, 'delete'])->name('post.delete');

Route::post('/post/{post}/fav', [ControllerPost::class, 'handleFav'])->name('post.favorito');

Route::post('/post/{post}/like', [ControllerPost::class, 'handleLike'])->name('post.like');