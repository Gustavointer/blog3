@extends('templates.base')

@section('imagem','pipabento.jpg')
@section('conteudo')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <a href="{{route('post.inserir')}}"><button type="button" class="btn btn-outline-primary">Criar novo post</button></a>
            @if($posts)
            @foreach($posts as $p)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('post', $p)}}">
                    <h2 class="post-title">{{$p->titulo}}</h2>
                </a>
                <p class="post-meta">
                    Posted by {{$p->usuario}}
                </p>
                <a href="whatsapp://send?text=Compartilhar esse post">Compartilhar esse post</a>
                @if (!empty(Auth::user()->id))
                <form method='post' action="{{route('post.like', $p)}}">
                    @csrf
                    @if(isset($p->relacao[0]) && $p->relacao[0]->like==1)
                    <input name='like' type='submit' value='Remover Like {{$p->likes}}' />
                    @else
                    <input name='like' type='submit' value='Like {{$p->likes}}' />
                    @endif
                </form>
                <form method='post' action="{{route('post.like', $p)}}">
                    @csrf
                    @if(isset($p->relacao[0]) && $p->relacao[0]->like==2)
                    <input name='like' type='submit' value='Remover Deslike {{$p->deslikes}}' />
                    @else
                    <input name='like' type='submit' value='Deslike {{$p->deslikes}}' />
                    @endif
                </form>
                <form method='post' action="{{route('post.favorito', $p)}}">
                    @csrf
                    @if (isset($p->relacao[0]) && $p->relacao[0]->favorito==1)
                    <input name='fav' type='submit' value='Remover dos Favoritos' />
                    @else
                    <input name='fav' type='submit' value='Adicionar aos Favoritos' />
                    @endif
                </form>
                @endif
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection