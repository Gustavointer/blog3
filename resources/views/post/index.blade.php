@extends('templates.base')
@section('imagem', 'trem.jpg')

@section('conteudo')
<!-- Post Content-->
<article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h1>{{ $post->titulo }}</h1>
                    <p><i>{{ $post->usuario }}, {{ $post->data }}</i></p>
                    <p>{{ $post->conteudo }}</p>
                    <a href="{{ route('post.edit', $post) }}" class="editar-post"><button class="btn btn-outline-primary"
                            style='border: 1px solid rgb(118, 118, 118);'>Editar post</button></a>
                    <a href="{{ route('post.delete', $post) }}"><button class="btn btn-outline-danger"
                            style='border: 1px solid rgb(118, 118, 118);'>Excluir</button></a>
                </div>
            </div>
        </div>
    </article>
@endsection