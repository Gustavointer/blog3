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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sobremim', function(){
    return view('sobre');
})->name('sobremim');

Route::get('/editar', function(){
    return view('editar');
})->name('editar');

Route::get('/post/excluir', [ControllerPost::class, 'excluir'])->name('excluir');

Route::get('/post', [ControllerPost::class, 'index'])->name('post');

Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

Route::get('/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/login', [UsuarioController::class, 'login'])->name('login');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/usuario/inserir', [UsuarioController::class, 'create'])->name('usuario.inserir');

Route::post('/usuario/inserir', [UsuarioController::class, 'insert'])->name('usuario.inserir');

Route::get('/post/inserir', [ControllerPost::class, 'create'])->name('post.inserir');

Route::post('/post/inserir', [ControllerPost::class, 'insert'])->name('post.inserir');

Route::get('/post/editar', [ProdutosController::class, 'edit'])->name('post.edit');

Route::put('/post/editar', [ProdutosController::class, 'update'])->name('post.update');

Route::get('/post/apagar', [ProdutosController::class, 'remove'])->name('post.remove');

Route::delete('/post/apagar', [ProdutosController::class, 'delete'])->name('post.delete');