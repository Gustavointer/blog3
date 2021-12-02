<?php

use App\Http\Controllers\ControllerUsuarios;
use App\Http\Controllers\ControllerPost;
use App\Http\Controllers\ContatoController;
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

Route::get('/excluir', [ControllerPost::class, 'excluir'])->name('excluir');

Route::get('/post', [ControllerPost::class, 'index'])->name('post');

Route::get('/contato', [ContatoController::class, 'index'])->name('contato');


