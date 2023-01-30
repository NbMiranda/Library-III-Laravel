<!-- Navbar -->
<nav id="senna" class="navbar navbar-expand-lg navbar sticky-top bg-light" bg-light>
    <div class="container-fluid">
        <a class="navbar-brand" href="#senna">
            <img src="{{ URL::asset('/imgs/redbook.png') }}" width="40" height="34">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Senna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Logar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            {{-- User image dropdown --}}
              <div class="dropdown">
                <img src="{{ URL::asset('/imgs/redperson.png') }}" 
                class="btn btn-secondary dropdown-toggle" type="button" id="user_image"
                data-bs-toggle="dropdown" aria-expanded="false" width="52" height="40">
                </img>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="">Login</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>

        </div>


    </div>
</nav>

<style>
  #user_image{
    background-color: white !important;
    border: 1px solid #00000033;
  }
</style>