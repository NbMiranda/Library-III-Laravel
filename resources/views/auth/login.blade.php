@extends('layouts.doctype')

@section('title', 'Login')
    

@section('')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                
                                <a href="{{ route('register') }}">Não tem cadastro registre-se agora</a>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div> --}}
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
{{-- 
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-0 col-md-2 col-lg-4"></div>
        <div class="col-sm-12 col-md-8 col-lg-4" id="login">

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
                        Não tem cadastro registre-se agora</a>
                    
                    
                </div>


                {{-- submit form button (login) --}}
                <button type="submit" class="btn btn-danger"
                style="margin-top: .8em">
                {{ __('Login') }}
                </button>
            </form>

        </div>
        <div class="col-sm-0 col-md-2 col-lg-4"></div>
    </div>
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