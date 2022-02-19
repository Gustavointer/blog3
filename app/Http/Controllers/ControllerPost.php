<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\RelacaoPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerPost extends Controller {
    public function index(Post $post) {
        return view('post.index', ['post' => $post]);
    }

    public function home() {
        $posts = Post::orderBy('data', 'desc')->get();
        if (!empty(Auth::user()->id)) {
            foreach ($posts as $post) {
                $post->relacao = RelacaoPost::select('favorito', 'like')->where([
                    ['idPost', '=', $post->id],
                    ['idUsuario', '=', Auth::user()->id]
                ])->get();

                $post->likes = RelacaoPost::where([
                    ['like', '=', '1'],
                    ['idPost', '=', $post->id],
                ])->count();
                $post->deslikes = RelacaoPost::where([
                    ['like', '=', '2'],
                    ['idPost', '=', $post->id],
                ])->count();
            }
        }
        return view('home', ['posts' => $posts]);
    }

    public function insert(Request $form) {
        $post = new Post();

        $post->titulo = $form->titulo;
        $post->conteudo = $form->conteudo;
        $post->data = $form->data;
        $post->usuario = $form->usuario;

        $post->save();
        return redirect()->route('home');
    }

    public function edit(Post $post) {
        return view('post.editar', ['p' => $post]);
    }

    public function update(Request $form, Post $post) {
        $post->titulo = $form->titulo;
        $post->conteudo = $form->conteudo;
        $post->data = $form->data;
        $post->usuario = $form->usuario;

        $post->save();

        return redirect()->route('home');
    }

    public function delete($post) {
        $postE = Post::find($post);
        $postE->delete();

        return redirect()->route('home');
    }

    public function handleFav($post, Request $form) {
        $fav = ($form->fav == "Adicionar aos Favoritos") * 1;
        $postF = RelacaoPost::select('id')->where([
            ['idPost', '=', $post],
            ['idUsuario', '=', Auth::user()->id]
        ])->first();
        if (!$postF) {
            $postF = new RelacaoPost();
            $postF->idPost = $post;
            $postF->idUsuario = Auth::user()->id;
        }
        $postF->favorito = $fav;
        $postF->save();

        return redirect()->route('home');
    }

    public function handleLike($post, Request $form) {
        switch (explode(' ', $form->like)[0]) {
            case "Deslike":
                $like = 2;
                break;
            case "Like":
                $like = 1;
                break;
            default:
                $like = 0;
        }
        $postL = RelacaoPost::select('id')->where([
            ['idPost', '=', $post],
            ['idUsuario', '=', Auth::user()->id]
        ])->first();
        if (!$postL) {
            $postL = new RelacaoPost();
            $postL->idPost = $post;
            $postL->idUsuario = Auth::user()->id;
        }
        $postL->like = $like;
        $postL->save();

        return redirect()->route('home');
    }
}