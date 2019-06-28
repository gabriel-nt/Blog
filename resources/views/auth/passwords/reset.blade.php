@extends('layouts.login')

@section('content')
<div class="row login">
        <div class="col s12 l4 push-l4">
            <div class="card">
                <div class="card-action red white-text">
                    <h3>Login</h3>
                </div>
                <div class="card-content">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" class="validate @error('email') invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                        <span class="helper-text" data-error="Email Inválido" data-success="Email válido"></span>
                        </div>
                        @error('email')
                        <span class="helper-text invalid">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                        <div class="input-field">
                            <label for="password">Nova Senha</label>
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
                            <button class="btn-large red">Resetar Senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
