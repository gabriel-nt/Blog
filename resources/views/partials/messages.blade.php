@if(Session::has('status'))
<div class="row" id="semMargem">
    <div class="col s12 msg-info z-depth-3">
        <div class="container">
            <strong>Sucesso</strong>
            <p>{{ Session::get('status') }}</p>
        </div>
    </div>
</div>
@endif
@if(count($errors)>0)
<div class="row">
    <div class="container">
        <div class="col s12 red-text red darken-4">
            <strong>Erros</strong>
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif