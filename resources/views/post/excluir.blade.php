@extends('templates.base')
@section('imagem', 'delete.jpg')
@section('ajustecss', 'head-excluir')

@section('conteudo')
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                    <!-- Submit Button delete ou clic errado-->
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <strong>Cuidado!</strong> Você está prestes a remover este post!
                    <br>
                    <p>Você tem certeza que deseja apagar este produto para sempre?</p>
                    <br>
                    <input type="submit" class="btn btn-danger" value="Pode apagar sem medo">
                    <a href="index.html" class="btn btn-secondary">Desculpa, eu cliquei errado!</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection