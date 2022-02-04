@extends('templates.base')
@section('title', 'Usuários')
@section('h1', 'Página de Usuários')

@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de usuários</p>
        <a class="btn btn-primary" href="{{route('usuario.inserir')}}" role="button">Cadastrar usuário</a>
    </div>
</div>
<div class="row">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>
        @foreach($usuario as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nome}}</td>
            <td>{{$user->email}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection