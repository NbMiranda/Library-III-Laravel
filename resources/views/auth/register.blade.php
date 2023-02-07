@extends('layouts.doctype')

@section('title', 'Register')



@section('content')
    <section class="container">
        <div class="row">
            <div class="col-sm-0 col-md-2 col-lg-3"></div>
            <div class="col-sm-12 col-md-8 col-lg-6" id="login">

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- name Input --}}
                    <label for="name" id="label">Nome</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid 
                    @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                    placeholder="Digite seu nome">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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

                    </div>

                    {{-- Confirm password --}}
                    <div class="form-group">
                        <label for="password-confirm" id="label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirme a senha"
                        name="password_confirmation" required autocomplete="new-password">
                    </div>
                    

                    {{-- submit form button (login) --}}
                    <button type="submit" class="btn btn-danger"
                    style="margin-top: .8em">
                    {{ __('Register') }}
                    </button>
                </form>

            </div>
            <div class="col-sm-0 col-md-2 col-lg-3"></div>
        </div>
    </section>
@endsection