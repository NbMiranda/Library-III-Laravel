@extends('layouts.doctype')

@section('title', 'Login')


@section('content')
    
    <div class="center">
        <form method="get">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username">
            <br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
            <br>
            <label for="email">emai:</label><br>
            <input type="email" id="email" name="email">
            <br>

            <input type="submit" value="login">
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
