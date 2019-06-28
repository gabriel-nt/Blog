@extends('layouts.app')

@section('content')
@include('partials.messages')
<div class="row container">
    <h3 class="center">Notícias</h3>
    <div class="col s12 ">
        <div class="responsive-table">
    <table  class="bordered striped centered highlight responsive-table">
        <thead>
          <tr>
            <th>#</th>
              <th>Titulo</th>
              <th>Data</th>
              <th>Horário</th>
              <th>Ações</th>
          </tr>
        </thead>       
        
        <tbody> 
                @foreach($noticias as $noticia)          
            <tr>
                <td><b>{{ $noticia->id }}</b></td>
                <td>{{ $noticia->titulo }}</td>
                <td>{{ $noticia->data }}</td>
                <td>{{ $noticia->horario }}</td>
                <td>
                    <a href="{{ route('noticias.show',['noticia'=> $noticia->id])}}" class="btn-small amber darken-1">Visualizar</a>        
                    <a href="{{ route('noticias.edit',['noticia'=> $noticia->id])}}" class="btn-small  indigo darken-4">Editar</a>
                    <a href="{{ route('noticias.delete',['noticia'=> $noticia->id])}}" class="btn-small red darken-4">Deletar</a>
                </td>
            </tr>
            @endforeach 
        </tbody>
        
</table>
</div>  
    </div>      
</div>
@endsection