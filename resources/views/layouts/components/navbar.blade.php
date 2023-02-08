<!-- Navbar -->
<nav id="nav" class="container navbar navbar-expand-lg navbar sticky-top bg-light" bg-light>
    <div class="container-fluid" id="nav">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ URL::asset('/imgs/redbook.png') }}" width="40" height="34">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            style="border: none;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Library</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books') }}">Livros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('writers') }}">Escritores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            {{-- User image dropdown --}}
            @if (Auth::check())
                <div class="dropdown">
                    <img src="{{ URL::asset('/imgs/redperson.png') }}" class="btn btn-secondary dropdown-toggle"
                        type="button" id="user_image" data-bs-toggle="dropdown" aria-expanded="false" width="52"
                        height="40">
                    
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('myAccount') }}"
                            style="color: red">{{ auth()->user()->name }}</a></li>
                        {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                        <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>


                    </ul>
                </div>
            @else
                <div>
                  <a href="{{ route('login') }}"><button class="btn" id="login_btn">Login</button></a>
                </div>

            @endif

        </div>
    </div>
</nav>

<style>

    #user_image {
        background-color: #F5F5F5 !important;
        border: none;
        margin-right: 2em;
    }

    #nav {
        background-color: #F5F5F5 !important;
    }
    #login_btn{
      background-color: #F5F5F5;
      border-radius: 7px;
      border: none;
      color: red ;
      font-weight: 400;
      font-size: 1em;
      transition: .4s;
    }
    #login_btn:hover{
      background-color: red;
      border-radius: 7px;
      border: none;
      color: #F5F5F5;
      font-weight: 400;
      transition: .3s
    }
</style>
