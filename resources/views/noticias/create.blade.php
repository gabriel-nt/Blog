@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Publicar notícia</h3>
    <div class="col s12">
        <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row input-field col s12" id="semMargem">
                <i class="material-icons prefix">play_arrow</i>
                <input id="titulo"type="text" class="validate @error('titulo') invalid @enderror" name="titulo" value="{{old('titulo')}}" required>
                <label for="titulo">Título</label>
                @error('titulo')
                <span class="red-text validacao">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="row input-field col s12" id="semMargem">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="descricao" name="descricao" class="materialize-textarea validate @error('descricao') invalid @enderror" required>{{old('descricao')}}</textarea>
                <label for="descricao">Descrição</label>
                @error('descricao')
                <span class="red-text validacao">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="row">
            <div class="file-field input-field" id="semMargem">
                <div class="btn waves-effect waves-light">
                    <i class="material-icons left">add_a_photo</i>
                    <span>Imagem</span>
                    <input type="file" name="imagem" value="{{old('imagem')}}" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate @error('imagem') invalid @enderror" name="imagem" type="text" required>
                    @error('imagem')
                    <span class="red-text validacao">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn-large red darken-4 waves-effect waves-light">Publicar</button>
            </div>       
        </form>
    </div>
</div>
@endsection