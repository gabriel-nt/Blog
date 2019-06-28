@extends('layouts.login')

@section('content')

<div class="row login">
    <div class="col s12 l4 push-l4">
        <div class="card">
            <div class="card-action red white-text">
                <h3>Login</h3>
            </div>
            <div class="card-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
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
                        <input type="password"name="password" required autocomplete="current-password">
                    </div>

                    <p>
                        <label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                                @endif
                        </label>
                    </p>

                    <p>
                        <label>
                            <input type="checkbox" name="remember" class="filled-in" id="remember" {{ old('remember') ? 'checked' : '' }} name="remember"/>
                            <span for="remember">Lembrar</span>
                        </label>
                    </p>

                    <div class="row center-align">
                        <button class="btn-large red">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
