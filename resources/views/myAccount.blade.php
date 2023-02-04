@extends('layouts.doctype')

@section('title', 'Minha conta')
    
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-12 text center" id="user_data_image">
       
        </div>
    </div>
    <style>
        #user_data{
            background-color: red;
            height: 91vh !important;
        }
        #user_data_image{
            border-radius: 150px;
            width: 40vh;
            height: 40vh;
            margin-top: 3em;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url({{ URL::asset('/imgs/eunathan.jpg') }}) ;
        }

    </style>
@endsection