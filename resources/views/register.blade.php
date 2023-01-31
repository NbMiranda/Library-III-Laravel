@extends('layouts.doctype')

@section('title', 'Register')


@section('content')
    
    <div class="center">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name">
            <br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
            <br>
            <label for="email">emai:</label><br>
            <input type="email" id="email" name="email">
            <br>

            <input type="submit" value="register">
        </form>
    </div>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection
