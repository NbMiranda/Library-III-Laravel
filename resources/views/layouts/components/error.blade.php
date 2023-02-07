@extends('layouts.doctype')

@section('title', 'Error')
    

@section('content')
    <div id="error">

    </div>

    <style>
        #error{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 92vh;
            background-position:10% 34%;
            background-repeat:no-repeat;
            background-size: cover;
            background-image: url({{ URL::asset('/imgs/error404.jpg') }}) ;
        }

    </style>
@endsection