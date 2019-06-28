@extends('layouts.login')

@section('content')

<div class="row login" style="margin-top:100px">
        <div class="col s12 l4 push-l4">
            <div class="card">
                <div class="card-action red white-text">
                    <h3>Resetar Senha</h3>
                </div>
                <div class="card-content">
                    @if (session('status'))
                        <div class="helper-text green-text" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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
                        <div class="row center-align">
                            <button class="btn-large red">Mudar Senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
