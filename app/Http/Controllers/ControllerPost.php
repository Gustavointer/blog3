<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ControllerPost extends Controller
{
    public function index(){
        return view('post.index');
    }
    
    // public function excluir(){
    //     return view('post.excluir');
    // }

    public function create()
    {
        return view('home');
    }

    public function insert(Request $form)
    {
        $post = new Post();

        $post->titulo = $form->titulo;
        $post->texto = $form->texto;
        $post->data = $form->data;
        $post->usuario = $form->usuario;

        $post->save();
        return redirect()->route('home');
    }
    
    public function edit(Post $prod)
    {
        return view('editar');
    }

    public function update(Request $form, Post $post)
    {
        $post->titulo = $form->titulo;
        $post->texto = $form->texto;
        $post->data = $form->data;
        $post->usuario = $form->usuario;

        $post->save();

        return redirect()->route('home');
    }

    public function remove(Post $post)
    {
        return view('post.remove');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }
}
