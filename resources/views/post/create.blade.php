@extends('templates.base')
@section('imagem','pipabento.jpg')

@section('conteudo')
<div class="row">
    <div class="col-4">
        <form method="post" action="{{route('usuario.inserir')}}">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>

            <div class="mb-3">
                <label for="texto" class="form-label">Texto do seu post</label>
                <input type="email" class="form-control" id="conteudo" name="conteudo">
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data de publicação</label>
                <input type="date" class="form-control" id="data" name="data">
            </div>
            
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>
    </div>
</div>
@endsection