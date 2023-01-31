@extends('layouts.doctype')

@section('title', 'Login')


@section('content')
    
    <div class="center">
        <form action="{{ route('loginPost') }}" method="post">
            @csrf

            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif

            <label for="email">Username:</label>
            <input type="text" id="email" name="email">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br>
            <input type="submit" name="login" value="login">
        </form>
    </div>
    <style>


        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fb101078;
            padding: 20px;
            border-radius: 10px;
        }

        label {
            font-size: 20px;
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #000080;
            color: #FFFFFF;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333399;
        }
    </style>
@endsection
