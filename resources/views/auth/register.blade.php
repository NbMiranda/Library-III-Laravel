@extends('layouts.doctype')

@section('title', 'Register')

@section('')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
        <div class="col-sm-0 col-md-2 col-lg-4"></div>
    </div>
@endsection