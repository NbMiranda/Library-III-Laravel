@extends('layouts.doctype')

@section('title', 'Reset')

@section('')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
<section class="container">

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:auto;">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif   

    <div class="row">
        <div class="col-sm-0 col-md-2 col-lg-3"></div>
        <div class="col-sm-12 col-md-8 col-lg-6" id="login">
            {{-- @if (session('status')) --}}
            {{-- <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div> --}}
            {{-- @endif --}}

            <form method="POST" action="{{ route('password.email') }}">
                @csrf


                {{-- Email Input --}}
                <div class="form-group">
                    {{-- <h4>Recuperar senha</h4> --}}
                <label for="email" id="label">Email</label>
                <input id="email" type="email" class="form-control @error('email') 
                is-invalid @enderror" name="email" value="{{ old('email') }}" 
                required autocomplete="email" autofocus placeholder="Informe seu email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <P>
                    Um e-mail com um link para a redefinição de senha será enviado 
                    para o endereço de e-mail cadastrado em sua conta.
                </P>
                

                {{-- submit form button (login) --}}
                <button type="submit" class="btn btn-danger"
                style="margin-top: .5em">
                Enviar link para redefinição de senha
                </button>
            </form>

        </div>
        <div class="col-sm-0 col-md-2 col-lg-3"></div>
    </div>
</section>
@endsection
