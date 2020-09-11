@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar publicação</h3>
    <div class="col s12">
        <form action="{{ route('noticias.update',['noticia'=>$noticia->id]) }}" method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row input-field col s12" id="semMargem">
                <i class="material-icons prefix">play_arrow</i>
                <input type="text" class="validate @error('titulo') invalid @enderror" name="titulo" value="{{ old('noticia',$noticia->titulo)}}" required>
                <label class="labels">Título</label>
                @error('titulo')
                <span class="red-text validacao">
                    {{ $message }}
                </span>
            </div>
            @enderror
            <div class="row input-field col s12" id="semMargem">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="descricao" name="descricao" class="materialize-textarea validate @error('descricao') invalid @enderror" required>{{ old('noticia',$noticia->descricao)}}</textarea>
                <label for="descricao" class="labels">Descrição</label>
                @error('descricao')
                <span class="red-text validacao">
                    {{ $message }}
                </span>
                @enderror
            </div>
            @if ($noticia->imagem !=null)
                <span><b>Imagem:</b></span>
                <img src="{{ url("{$noticia->imagem}") }}" style = "width: 50px;">
                <input type="hidden" value="{{ $noticia->imagem }}" name="image">
            @endif
            <div class="file-field input-field">
                <div class="btn waves-effect waves-light">
                    <i class="material-icons left">add_a_photo</i>
                    <span>Imagem</span>
                    <input type="file" name="imagem"> 
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate @error('imagem') invalid @enderror" type="text">
                    @error('imagem')
                    <span class="red-text validacao">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn-large red darken-4 waves-effect waves-light">Editar</button>
            </div>       
        </form>
    </div>
</div>
@endsection