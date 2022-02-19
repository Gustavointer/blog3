@extends('templates.base')
@section('imagem', 'edit.jpg')

@section('conteudo')
<!-- Main Content-->
<div class="row justify-content-center">
    <div class="col-4" style='text-align:center'>
        <h2>Edite seu post aqui !</h2>
        <form method="post" action="{{route('post.update', $p)}}">
            @csrf
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" value="{{$p->titulo}}" name="titulo">
            </div>

            <div class="mb-3">
                <label for="texto" class="form-label">Texto do seu post</label>
                <input type="text" required class="form-control" value="{{$p->conteudo}}" id="conteudo" name="conteudo">
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data de publicação</label>
                <input type="date" required class="form-control" id="data" name="data">
            </div>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" required class="form-control" value="{{$p->usuario}}" id="usuario" name="usuario">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>
    </div>
</div>
@endsection