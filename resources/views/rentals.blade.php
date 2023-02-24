@extends('layouts.doctype')

@section('title', 'Alugueis')
    

@section('content')

<section class="container">

    {{-- rent success message --}}
    {{-- @if (session('book_success'))
        <div class="alert alert-success alert-dismissible fade show" 
        id="success-message1" role="alert">
            {{ session('book_success') }}
        </div>
    @endif --}}

    <h1 class="text-center" style="margin:2em 0 1em 0;">Alugueis</h1>

    <div class="row">            
        {{-- Read all the books --}}
        @foreach ($books as $row)
            <div class='col-lg-3 col-md-6 col-sm-12' id='book-content'>
                
                <h4 class='red text-center' style='height:2.3em; margin-top:1em; word-wrap: break-word;' >
                    {{ $row->book_name }}
                </h4>
                               
                {{-- Book cover --}}
                <div id='book_cover' style='background-image: url({{ URL::asset('/imgs/book_covers/'.$row->book_cover) }});'>
                    {{-- rent button --}}
                    <a class="btn btn-outlinre-dark" href="{{route("updateBook", ['id' => $row->id])}}" id="rentLink">
                        <i class="bi bi-arrow-left-right" style="font-size: 20px;"></i>                        
                    </a>
                </div>

                <div>

                    {{-- Writer name --}}
                    <p class='text-center' style='margin-top:.5em;'><b>Escritor: <span class="red">
                    {{ $row->writer_name }}</span></b>
                    </p>

                    {{-- book genre --}}
                    <p class='container text-center' ><b>Generos:</b> {{ $row->genre }}</p>

                    {{-- status --}}
                    @if ($row->status == "rentable")
                        <p class="text-center"><b>Status: </b><span class="avaliable">Disponível</span></p>
                    @else
                        <p class="text-center"><b>Status: </b><span class="not-avaliable">Indisponível</span></p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</section>
<style>
    #rentLink{
        position: relative;
        top: 27vh;
        left: 15vh;
    }
</style>

@endsection