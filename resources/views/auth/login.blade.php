@extends('layouts.doctype')

@section('title', 'Login')
    
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-sm-0 col-md-2 col-lg-3"></div>
            <div class="col-sm-12 col-md-8 col-lg-6" id="login">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- Email Input --}}
                    <div class="form-group">
                    <label for="email" id="label">Email</label>
                    <input id="email" type="email" placeholder="Digite seu email" class="form-control @error('email')  
                        is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- Password Input --}}
                    <div class="form-group">
                    <label for="password" id="label">Senha</label>
                    <input id="password" type="password" placeholder="Digite sua senha" class="form-control 
                        @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <a href="{{ route('register') }}" id="register_link">
                            Não tem cadastro registre-se agora
                        </a>
                        
                        
                    </div>
                    
                    <div class="form-group">
                        @if (Route::has('password.request'))

                        <a href="{{ route('password.request') }}" id="register_link">
                            Esqueceu sua senha?
                        </a>
                        @endif
                    </div>


                    {{-- submit form button (login) --}}
                    <button type="submit" class="btn btn-danger">
                    {{ __('Login') }}
                    </button>
                </form>

            </div>
            <div class="col-sm-0 col-md-2 col-lg-3"></div>
        </div>
    </section>
@endsection
{{-- <style>
    #login{
        /* border: 1px solid red; */
        /* border-radius: 9px; */
        margin-top: 20vh;
        padding: 10px;
    }
    .form-control:focus{
        border-color: #FF0000 !important;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6) !important;

    }
    #label{
        color: red;
        font-size: 1.2em;
        font-weight: 500;
        margin: .5em 0 .3em 0;
    }
    #register_link{
        text-decoration: none;
        color: red;
        transition:.3s;
    }
    #register_link:hover{
        text-decoration: none;
        color: #c00000;
        transition:.5s;

    }
    #password{
        margin-bottom: .6em;
    }
</style> --}}