@extends('layouts.doctype')

@section('title', 'Minha conta')
    
@section('content')
    <section class="container">
        <div id="user_content">
            <div id="user_data_image">
        
            </div>
            <h4 class="text-center">Nathan Barros Miranda</h4>
        </div>
        
    </section>
    @include('layouts.components.footer')
    <style>
        #user_content{
            background-color: red;
            height: 91vh !important;
            width: 24em;
            /* margin-top: 2em; */
        }
        #user_data_image{
            border-radius: 150px;
            width: 19em;
            height: 41vh;
            margin: 0 0 1em 2.5em;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url({{ URL::asset('/imgs/eunathan.jpg') }}) ;
        }

    </style>
@endsection