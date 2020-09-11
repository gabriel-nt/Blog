@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row margemBottom">
        <div class="col s12 l10 push-l1">               
            <h4 style="margin-top:0;padding-top:10px">{{ $noticia->titulo }}</h4>
            <img src="{{ url("{$noticia->imagem}") }}" class="responsive-img">
            <p class="flow-text" align="justify">{{ $noticia->descricao }}</td>
            <div class="row">
                <div class="col s12"> 
                    <p class="left">{{ $noticia->data }}</p>
                    <p class="right">{{ $noticia->horario }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l10 push-l1"> 
            <p class="justify-content-center"><b>Você deseja, realmente, deletar essa noticia:</b></p>
            <a href="{{ route('noticias.destroy',['noticia'=> $noticia->id]) }}" class="btn deep-orange accent-3">Sim</a>
            <a href="{{ route('noticias.index')}}" class="btn teal darken-4">Não</a>
        </div>
    </div>
</div>
@endsection