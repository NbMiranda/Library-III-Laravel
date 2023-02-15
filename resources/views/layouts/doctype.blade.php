<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('/imgs/redbook.png') }}" type="image/x-icon">
</head>

<body id="body-pd" style="padding-right: 0; width:98%;">
    <section id="dark" style="width: 101%;">
        {{-- Sidebar --}}
        <header class="header" id="header">
            <div class="header_toggle"> <i class="fa-solid fa-bars" style="margin-left: 0.3em;" id="header-toggle"></i> </div>
            @if (Auth::check())
                <div class="header_img"> <img src="{{ URL::asset('/imgs/redperson.png') }}" alt=""> </div>
                                
            @endif
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">          
                <div>
                    {{-- nav Home --}}
                    <a href="{{route('index')}}" class="nav_logo"> 
                        <i class="fa-solid fa-house" style="color:red;"></i> 
                        <span class="nav_logo-name">Biblioteca</span> 
                    </a>
                    <div class="nav_list">
                        {{-- nav Book --}}
                        <a href="{{route('books')}}" class="nav_link {{ request()->is('books') ? 'active' : '' }}">
                            <i class="fa-solid fa-book-open-reader"></i> 
                            <span class="nav_name">Livros</span>
                        </a>

                        {{-- nav Writer --}}
                        <a href="{{route('writers')}}" class="nav_link {{ request()->is('writers') ? 'active' : '' }}">
                            <i class="fa-sharp fa-solid fa-feather-pointed"></i> 
                            <span class="nav_name">Escritores</span>
                        </a>
                        
                        {{-- nav rentals --}}
                        <a href="{{route('index')}}" class="nav_link {{ request()->is('index') ? 'active' : '' }}"> 
                            <i class="bi bi-arrow-left-right"></i> 
                            <span class="nav_name">Alugueis</span> 
                        </a>
                        {{-- nav User --}}

                        @if (Auth::check())
                            <a href="{{route('myAccount')}}" class="nav_link {{ request()->is('myAccount') ? 'active' : '' }}"> 
                                <i class="fa-sharp fa-solid fa-user"></i> <span class="nav_name">{{auth()->user()->name}}</span> 
                            </a> 
                        @else
                            <a href="{{route('login')}}" class="nav_link {{ request()->is('login') ? 'active' : '' }}"> 
                                <i class="fa-solid fa-right-to-bracket"></i> <span class="nav_name">Login</span> 
                            </a> 
                        @endif
                        
                        {{-- Dark mode btn --}}
                        <a class="nav_link" type="button" id="moonBtn" onclick="darkMode()" style="display: ;"> 
                            <i class="fa-solid fa-moon"></i> <span class="nav_name">Dark mode</span> 
                        </a>
                        {{-- Light mode btn --}}
                        <a class="nav_link" type="button" id="sunBtn" onclick="lightMode()" style="display:none;"> 
                            <i class="fa-solid fa-sun"></i><span class="nav_name">Light mode</span> 
                        </a>

                        <a href="#" class="nav_link {{ request()->is('index') ? 'active' : '' }}"> 
                            <i class="fa-solid fa-play"></i> <span class="nav_name">action</span> 
                        </a> 
                    </div>
                </div>
                        
                @if (Auth::check())
                    <a href="{{ url('/logout') }}" class="nav_link"> 
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> 
                        <span class="nav_name">Desconectar</span> 
                    </a> 
                @endif
            </nav>
        </div>         
        {{-- Content --}}
        @yield('content')
        <style>
        ::-webkit-scrollbar-track{
        background-color: black;
        }

        ::-webkit-scrollbar{
            width: 7px;
            
        }

        ::-webkit-scrollbar-thumb{
            background: red;
            border-radius: 15px;
        }    
        </style> 
    </section>      
    {{-- @include('layouts.components.footer') --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
