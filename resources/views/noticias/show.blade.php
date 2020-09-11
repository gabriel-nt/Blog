@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">

@section('content')
<div class="background">
    <div class="container white">
        <div class="row margemBottom">
            <div class="col s12 l10 push-l1">               
                <h4 style="margin-top:0;padding-top:10px; font-family:'Alfa Slab One', cursive;">{{ $noticia->titulo }}</h4>
                <img src="{{  url("{$noticia->imagem}")  }}" class="responsive-img center imagem">
                <p class="flow-text" align="justify">{{ ($noticia->descricao) }}</td>
                <div class="row">
                    <div class="col s12"> 
                        <p class="left">{{ $noticia->data }}</p>
                        <p class="right">{{ $noticia->horario }}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row scrollspy" id="comentar">
            <div class="col s12 l10 push-l1">
                <h4 style="font-family:'Playfair Display', serif;">Diga algo sobre esta publicação</h4>
            <form action="{{ route('noticias.enviar-comentario') }}" method="POST" >
                @csrf
                <div class="input-field">
                    <input type="hidden" name="noticia_id" value="{{ $noticia->id }}"/>
                </div>
                <div class="input-field">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="validate" required>
                </div>
                <div class="input-field">
                    <label for="conteudo">Comentário</label>
                    <textarea name="conteudo" id="conteudo" class="materialize-textarea validate" required></textarea>   
                </div>
                    <input type="submit" name="enviar" value="Enviar comentário" class="btn teal darken-4">
                </form>
            </div>
        </div>
        <div class="row margemBottom">
            <div class="col s12 l10 push-l1">
                @if(count($comentarios) == 1 || count($comentarios) == 0)
                <h5>{{count($comentarios)}} Comentário</h5>
                @else
                <h5>{{count($comentarios)}} Comentários</h5>
                @endif
                @foreach ($comentarios as $comentario)
                <div class="comentario">
                    <p><b>{{ $comentario->nome}}</b></p>
                    <p>{{ $comentario->conteudo}}</p>     
                    <p class="p">
                        <i class="material-icons prefix" style="vertical-align: middle;">query_builder</i>
                        Postado em: {{ $comentario->data}} às {{ $comentario->horario}}.
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection