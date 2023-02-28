@extends('layouts.doctype')

@section('title', 'oops')
    


@section('content')
    <div id="center" style="width: 101%;">
        <div id="oops">
            <h1 class="text-center">Oops!</h1>
            <p class="text-center">
                Parece que você está tentando acessar
                uma página sem estar logado, faça o 
                <a href="{{ route('login') }}" id="links">Login</a> ou o
                <a href="{{ route('register') }}" id="links">Cadastre-se</a> agora
                para ter acesso a essa página
                e toda a <a href="{{ route('index') }}" id="links">Biblioteca Virtual</a>. 
            </p>
            <figure class="gif">
                <img src="{{ URL::asset('/imgs/rederror.gif') }}" id="error_gif">
            </figure>
        </div>
    
    </div>  
    @include('layouts.components.footer') 
    
@endsection