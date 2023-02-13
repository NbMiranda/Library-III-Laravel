@extends('layouts.doctype')

@section('title', 'Home')

@section('')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{ auth()->user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    
        <div class="row" id="alert_row">
            <div class="col-3"></div>

            <div class="col-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:auto;">
                    Você já está logado <strong>{{ auth()->user()->name }} </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>

            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="text-center" style="margin-top: 12vh">Bem vindo
                    <span style="color: red">{{ auth()->user()->name }}</span></h1>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-12">
                <figure class="gif">
                    <img src="https://media.tenor.com/oqJo9GcbfjYAAAAi/welcome-images-server.gif">
                </figure>
            </div>

        </div>
    <style>
        .alert{
            margin-bottom: -15vh;
        }
    </style>
@endsection
