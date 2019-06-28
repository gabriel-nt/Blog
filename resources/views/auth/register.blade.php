@extends('layouts.login')

@section('content')

<div class="row login" id="register">
        <div class="col s12 l4 push-l4">
            <div class="card">
                <div class="card-action red white-text">
                    <h3>Cadastro</h3>
                </div>
                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-field">
                            <label for="name">Nome</label>
                            <input type="text" class="validate @error('name') invalid @enderror" name="name" value="{{ old('name') }}" required>
                            <span class="helper-text" data-error="Nome Inválido" data-success="Nome válido"></span>
                            </div>
                        @error('name')
                        <span class="helper-text invalid">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" class="validate @error('email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <span class="helper-text" data-error="Email Inválido" data-success="Email válido"></span>
                        </div>
                        @error('email')
                        <span class="helper-text invalid">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                        <div class="input-field">
                            <label for="password">Senha</label>
                            <input type="password" class="validate @error('password') invalid @enderror"name="password" required autocomplete="new-password">
                        </div>
                        @error('password')
                        <span class="helper-text invalid">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="input-field">
                            <label for="password-confirm">Confirme sua senha</label>
                            <input type="password" name="password_confirmation"required autocomplete="new-password">
                        </div>
    
                        <div class="row center-align">
                            <button class="btn-large red">Cadastre-se</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
