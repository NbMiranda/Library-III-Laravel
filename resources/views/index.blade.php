@extends('layouts.doctype')

@section('title', 'Library')


@section('content')

    <section class="">
        <h1 class="red text-center" style="margin:1.1em;">
            Biblioteca 
        </h1>
        
        <div class="row dark" id="index_text">
            <div class="col-7">
                <p class="text-center" id="paragraph">
                    Seja muito bem-vindo a Biblioteca virtual em sua versão nova e 
                    melhorada, faça o <a href="{{ route('login') }}" id="links">Login</a>
                    para ter acesso total a biblioteca. <br> <br>
                    Aqui caso você queira cadastrar um livro ou ver todos os
                    livros cadastrados é só ir em 
                    <a href="{{ route('books') }}" id="links">Livros</a>, e cadastrar seu livro.
                    <br><br>

                    Você também pode alugar um livro em <a href="{{route('rentals')}}" id="links">Aluguéis</a>, 
                    pode-se alugar até no máximo 5 livros, 
                    você pode acompanhar seus livros alugados
                    na área do usuário.
                </p>    
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <img src="{{ URL::asset('/imgs/indexbook280.png') }}" alt="">
            </div>
        </div>
        
        @if ($books->count() == 9)
            @include('layouts.components.carousel')            
        @endif
        
    </section>
    @include('layouts.components.footer')

    <style>
        #paragraph{
            padding:2.5em;
            /* font-weight: 450; */
            font-size: 1.3em;
        }
        #book_box{
            border: 1px solid red;
            width: 16.9em;
            height: 22em;
            margin-left: 8em; 
        }
    </style>
    @endsection