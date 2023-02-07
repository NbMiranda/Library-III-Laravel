@extends('layouts.doctype')

@section('title', 'Library')


@section('content')
    <section class="container">
        <h1 class="red text-center" style="margin:1.1em;">
            Biblioteca
        </h1>
        
        <div class="row" id="index_text">
            <div class="col-7">
                <p class="text-center" id="paragraph">
                    Seja muito bem vindo a Biblioteca virtual em sua versão nova e 
                    melhorada, faça o <a href="" id="links">Login</a>
                    para ter acesso total a biblioteca. <br> <br>
                    Aqui caso você queira cadastrar um livro ou ver todoas os
                    livros cadastrados é só ir em 
                    <a href="" id="links">Livros</a>, e cadastrar seu livro.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias assumenda pasjoida dajsoidaisjd kansdjas9jd
                </p>    
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <img src="{{ URL::asset('/imgs/indexbook280.png') }}" alt="">
            </div>
        </div>
        
        {{-- Carousel last 9 books  --}}

        <h2 class="red text-center" style="margin:1.1em 0 1.1em 0;">
            Ultimos livros
        </h2>

        <div class="row" style="margin-bottom:1.1em;">
            <div class="col-4" id="book_box">
                
            </div>
            <div class="col-4" id="book_box">

            </div>
            <div class="col-4" id="book_box">

            </div>
        </div>
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