<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ControllerPost extends Controller
{
    public function index(){
        return view('post.index');
    }
    
    public function excluir(){
        return view('post.excluir');
    }
}
