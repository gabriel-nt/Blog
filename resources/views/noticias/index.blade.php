@extends('layouts.app')

@section('content')
@include('partials.messages')
<div id="service" class="scrollspy">
  <div class="section">
  <!-- Icon Section -->
    <div class="row container">
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center black-text">
            <i class="material-icons icone medium">sync</i>
          </h2>
          <h5 class="center" style="font-family:'Playfair Display', serif;">Sempre atualizado</h5>
          <p align="justify">
            O site PipocaFilmes conta com uma grande gama de escritos e usuários que ajudam a manter o site organizado e sempre atualizado. Diariamente, são postados diversas notícias e novidades relacionadas ao mundo dos cinemas. E você pode fazer parte do grupo de escritores do site, basta se regitrar e começar a escrver suas publicações.
          </p>
        </div>
      </div>
  
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center black-text">
            <i class="material-icons icone medium">notifications_active</i>
          </h2>
          <h5 class="center" style="font-family:'Playfair Display', serif;">Sistema de notificações</h5>
          <p align="justify">
            Contamos com um sistema de notificações que permite que você receba um aviso que foi postado uma nova notícia, um novo artigo ou até mesmo uma critíca relacionada a algum filme, documentário ou série. Para você receber todas essas publicações na sua caixa de mensagem, basta você cadastrar seu email e aproveitar o conteúdo.
          </p>
        </div>
      </div>
  
      <div class="col s12 m4">
        <div class="icon-block">
          <h2 class="center black-text">
            <i class="material-icons icone medium">movie_filter</i>
          </h2>
          <h5 class="center" style="font-family:'Playfair Display', serif;">Converse conosco</h5>
          <p align="justify">
            Sinta-se à vontade para entrar em contato com a nossa equipe de funcionário e escritores. Estamos sempre prontos para esclarecer qualquer dúvida ou para simplesmente trocar uma ideia. Você pode entrar em contato conosco preenchendo o formulário de contato, e assim que possível lhe retornaremos. Enquanto isso, você pode fazer comentários nas publicações.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<section>
  <div class="slider scrollspy">
    <ul class="slides">
      <li>
        <img src="img/anuncie-aqui.png" class="responsive-img"/>
        <div class="caption right-align">
        <h3 class="black-text"><b>Anuncie conosco</b></h3>
          <a class="white black-text waves-effect waves-light btn btn-large" href="{{ url('/').'#contato'}}">Contate-nos</a>
        </div>
      </li>
      <li>
        <img src="img/cinema.jpg" />
        <div class="caption right-align">
        <h3>Quais os próximos lançamentos???</h3>
          <h5 class="light white-text text-lighten-3">
            Se cadastre para ficar por dentro do mundo dos cinemas.
          </h5>
          <a class="white black-text waves-effect waves-light btn btn-large"
          href="{{ url('/').'#notificacao'}}">Cadastre-se</a>
        </div>
      </li>
      <li>
        <img src="img/critica.jpg" />
        <!-- random image -->
        <div class="caption right-align">
          <h3>Critícas e artigos</h3>
          <h5 class="light grey-text text-lighten-3">
            Leia nossas postagens.
          </h5>
          <a class="white black-text waves-effect waves-light btn btn-large"
          href="{{ url('/').'#noticias'}}">LEIA</a>
        </div>
      </li>
    </ul>
  </div>
</section>

<div class="container">
  <div class="row" id="noticias" class="scrollspy">
    <h3 class="center" style="font-family:'Playfair Display', serif;">Notícias</h3>
    @foreach($noticias as $noticia)
    <div class="col s12 m6 l4">
        <div class="card hoverable">
            <div class="card-image">
            <img src="{{ url("storage/{$noticia->imagem}") }}" class="materialboxed center image responsive-image"/>
            <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{ route('noticias.view',['noticia'=> $noticia->id]).'#comentar'}}"><i class="material-icons">add</i></a>
            </div>   
            <div class="card-content">
            <h5>{{ $noticia->titulo }}</h5>
            <p align="justify">
              A publicação {{ $noticia->titulo }} foi escrita e elaborada por {{ $noticia->autor }} na data de {{ $noticia->data}} no horário de {{ $noticia->horario }}. Clique no link abaixo para ler a publicação por completo
            </p>
            </div>
            <div class="card-action"><a href="{{ route('noticias.view',['noticia'=> $noticia->id])}}">Leia Mais</a></div>
        </div>
    </div>
    @endforeach
            
  </div>
  <div class="row">
    <div class="col s12 center-align">
        <ul class="pagination">
          {{$noticias->links()}}
        </ul> 
    </div>
  </div>
</div>

<div class="row container-fluid blue lighten-1" id="notificacao">      
  <div class="container center">
    <h3 class="white-text">Quer receber todas as notificações???</h3>
    <form action="{{ route('noticias.cadastrar-email') }}" method="POST" >
        @csrf
        <div class="row">
        <div class="input-field ">
            <i class="material-icons prefix white-text">email</i>
            <input id="email" type="email" name="email" class="validate white-text @error('email') invalid @enderror">
            <label for="email" class="white-text">Email</label>
            @error('email')
            <span class="helper-text red-text span">
              {{ $message }}
            </span>
            @enderror
            <span class="helper-text" data-error="Email inválido" data-success="Email válido"></span>
        </div>
        <button type="submit" class="black btn-large white-text right"> <i class="material-icons right">send</i>Enviar</button>
        </div>
    </form>
  </div>
</div>

<section id="contact" class="section section-contact scrollspy">
<h3 class="center" style="font-family:'Playfair Display', serif;">Contato</h3>
  <div class="container">
    <div class="row">
      <form class="col s12" method="POST" action="{{ route('noticias.send')}}">
        @csrf
        <div class="row" id="contato">
          <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input type="text" id="nome" name="nome" class="validate @error('nome') invalid @enderror" data-length="10">
            <label for="nome">Nome</label>
            @error('nome')
            <span class="helper-text red-text span">
              {{ $message }}
            </span>
            @enderror
          </div>
          
          <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input data-length="20" name="contato_email" id="contato_email" type="email" class="validate @error('contato_email') invalid @enderror">
            <label for="contato_email">Email</label>
            @error('contato_email')
            <span class="helper-text red-text span">
                {{ $message }}
            </span>
            @enderror
            <span class="helper-text" data-error="Email inválido" data-success="Email válido"></span>
          </div>         
        </div>

        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">message</i>
            <textarea id="mensagem" name="mensagem" data-length="120" class="materialize-textarea validate @error('mensagem') invalid @enderror"></textarea>
            <label for="mensagem">Messagem</label>
            @error('mensagem')
            <span class="helper-text red-text span">
                {{ $message }}
            </span>
            @enderror
          </div>
        </div>
        <button type="submit" class="black btn-large white-text">Enviar</button>
      </form>
    </div>
  </div>
</section>
@endsection