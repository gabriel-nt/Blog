<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/materialize.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}"  media="screen,projection"/>
</head>
<body>
    <div id="app">
        <header>
        <nav class="nav z-depth-0">
            <div class="nav-wrapper container">
                <a class="brand-logo" href="{{ url('/') }}">
                    <i class="material-icons large">local_movies</i>Filmes</a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>         
                </a>
                <ul class="right hide-on-med-and-down">
                    
                    <li class="desktop"><a href="{{ url('/').'#service' }}">Serviços</a></li>
                    <li class="desktop"><a href="{{ url('/').'#contato' }}">Contato</a></li>
                    @guest
                    <li>
                        <a class="nav-link btn-flat login" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li >
                            <a class="btn-flat white-text register" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                    <li class="drop">
                        <a href="#" class="dropdown-trigger white black-text waves-effect waves-light btn" data-target='dropdown'>
                            <i class="material-icons right">arrow_drop_down</i>
                            {{ Auth::user()->name }}
                        </a>
                    <ul id='dropdown' class='dropdown-content'>
                        <li>
                            <a href="{{ route('user.admin') }}">
                              Meus posts
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('noticias.create') }}">Publicar</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>     
                        </li>
                        <li class="divider" tabindex="-1"></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                    </li>       
                    @endguest
                </ul>

                <ul id="slide-out" class="sidenav">
                    <li class="blue darken-2">
                        <div class="row">
                            <div class="col s10">
                                <a href="#" class="subheader white-text"><i class="material-icons left">local_movies</i>Filmes</a>
                            </div>
                            <div class="col s2 valign-wrapper" >
                                <a class="sidenav-close right">
                                    <i style="height: 48px; line-height: 48px; margin-left: -0.75rem; cursor: pointer;" class="material-icons right white-text">close</i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">
                          <li class="padding-collapsible"><a href="{{ url('/').'#service' }}">Serviço</a></li>
                          <li class="padding-collapsible"><a href="{{ url('/').'#contato' }}">Contato</a></li>
                          @guest
                          <li class="padding-collapsible">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="padding-collapsible">
                                  <a href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                          @else
                          <li>
                          <a class="collapsible-header black-text"><i class="material-icons right">arrow_drop_down</i>
                            {{ Auth::user()->name }}
                          </a>
                          <div class="collapsible-body">
                              <ul>
                                <li>
                                    <a href="{{ route('user.admin') }}">
                                      Meus posts
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('noticias.create') }}">Publicar</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>     
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                              </ul>
                          </div>    
                          @endguest
                        </ul>
                    </li>
                  </li>
                </ul>
              </div>
            </nav>
            <div class="col s12 title center white-text">
              <a id="sobre" class="white-text btn btn-flat btn-large" href="{{ url('/').'#noticias'}}">Noticias</a>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="black page-footer blue darken-2">
            <div class="container">
                <div class="row">
                <div class="col l6 s12 center">
                    <h5 class="white-text">PipocaFilmes</h5>
                    <p align="justify" class="grey-text text-lighten-4">
                    O site PipocaFilmes é um blog especializado em conteúdo de filmes e cinemas. Produzimos contéudo de altissíma qualidade. Fique à vontade para entrar em contato ou comentar em qualquer uma de nossas publicações. Agradeçemos pela sua visita ao blog. Volte sempre!!!
                    </p>
                </div>
                <div class="col l6 s12 center">
                    <h5 class="white-text">Site</h5>
                    <p align="justify" class="grey-text text-lighten-4">
                        O site foi, totalmente, desenvolvido por <a class="orange-text text-lighten-3"> Gabriel Nunes Teixeira</a>, cujo o mesmo utilizou tecnologias como Laravel e MaterializeCSS para desenvolver o blog.
                    </p>
                </div>
                </div>
            </div>
            <div class="footer-copyright center">
                <div class="container">Todos os direitos reservados. © 2019</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
