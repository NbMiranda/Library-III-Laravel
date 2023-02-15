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
    
    <style>
        #center{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 92vh;
            background-position:bottom;
            background-repeat:no-repeat;
            background-size: cover;
            background-image: url({{ URL::asset('/imgs/redbackground.png') }}) ;
            
            /* background-color: red; */
        }
        #oops{
            /* background-color: blue; */
            height: 62vh;
            width: 110vh;
            border: 2px solid red;
            background-color: #f5f5f5f8;
            border-radius: 20px;
        }
        #oops h1{
            color: red;
            margin-top: .5em;
        }
        #oops p{
            padding: 1.5em 7em 0 7em;
            font-size: 1.3em;
            font-weight: 450;
            
        }
        #error_gif{
            height: 18em;
            margin-left: 39vh;
            transform: rotate(-45deg);
        }

        @media screen and (max-width: 704px) {
            #error_gif {
                height: 0;
            }
            #oops p{
                padding: 5em 1em 2em 1em;
            }
        }
    </style>



@endsection