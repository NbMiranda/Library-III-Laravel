@extends('layouts.doctype')

@section('title', 'Livros')
    


@section('content')
<section class="container">

    <div class="text-center" id="livros_title">
        <h1>Livros</h1>
    </div>

    <div class="row">
        <div class='col-lg-3 col-md-6 col-sm-12' id='book-content'>
            <form action="{{ route('books') }}" method="post">
                @csrf
                {{-- Book Title --}}
                <h4 class='red text-center' style='height:2.3em; margin-top: 1em; display:block;' id='book_add_title'>
                    Adicione um livro 
                    <button class="btn btn-outline-danger" type="butotn" onclick="addBook()">
                        <i class="bi bi-bookmark-plus-fill"></i>
                    </button> 

                </h4>
                {{-- Book Title Input--}}
                <input type='text' id="book_title" class='form-control' style="display:none; margin-bottom: 3.5vh; margin-top: 2.3em;" 
                placeholder="Digite o titulo do livro" name="book_name" required>

                {{-- Book cover --}}
                <div id='book_cover'>
                    {{-- submit Btn --}}
                    <button class="btn btn-outline-success" id="save_btn" type="submit" name="book_create" style="display:none;">
                        Salvar <i class="fa-sharp fa-solid fa-floppy-disk"></i>
                    </button>
                    
                    {{-- Cancel --}}
                    <button class="btn btn-outline-dark" id="cancel_btn" type="butotn" 
                    onclick="cancelAddBook()" style="display:none; margin:1em 0;">
                        Cancelar <i class="fa-solid fa-xmark"></i>
                    </button>

                    {{-- New writer link --}}
                    <a href="{{ route('writers') }}" id="links" style="font-size: 17px;">
                        + Novo escritor
                    </a>
                </div>
                
                {{-- Writer name --}}
                <p class='text-center' id="writer" style='margin-top:.5em;'><b>Escritor: <span class="red">
                Nome do escritor</span></b>
                </p>

                {{-- Writer select --}}
                <select name="writer_id" id="writer_select" class="form-select" style="display:none; margin:1em 0 ;" aria-label="Default select example" required>
                    
                    <option value="">-- Selecione o Escritor --</option> 
                    @foreach ($writers as $row)

                        <option value="{{$row->id}}">{{ $row->writer_name }}</option>

                    @endforeach
                </select>

                {{-- Genres input --}}
                <p class='container text-center' id="genre"><b>Generos:</b> Generos</p>
                <input type='text' name="genre" id="genre_input" class='form-control' style="display:none;" 
                placeholder="Digite um ou mais generôs do livro" required>
            </form>
        </div> 
            
        {{-- Read all the books --}}
        @foreach ($books as $row)
            <div class='col-lg-3 col-md-6 col-sm-12' id='book-content'>
                
                <h4 class='red text-center' style='height:2.3em; margin-top:1em; word-wrap: break-word;' >
                    {{ $row->book_name }}
                    
                    {{-- Edit button --}}
                    <a class="btn btn-outlinre-dark" href="{{route("updateBook", ['id' => $row->id])}}" >
                        <i class="fa-solid fa-pen" style="font-size: 20px;"></i>                        
                    </a>

                </h4>
                               
                {{-- Book cover --}}
                <div id='book_cover' style='background-image: url({{ URL::asset('/imgs/book_covers/'.$row->book_cover) }});'>
                    
                </div>

                <div>
                    {{-- Writer name --}}
                    <p class='text-center' style='margin-top:.5em;'><b>Escritor: <span class="red">
                    {{ $row->writer_name }}</span></b>
                    </p>


                    {{-- book genre --}}
                    <p class='container text-center' ><b>Generos:</b> {{ $row->genre }}</p>
                </div>
            </div>
        @endforeach
    </div>
    
</section>
@include('layouts.components.footer')
    <style>
        .card-body{
            background-color: #F5F5F5;
            border-color:red;
        }
        #livros_title{
            margin-bottom: 5vh;
            background-color: #f5f5f5;
            border-radius: 10px;
            height: 10em;
            /* background-position:10% 43%; */
            background-repeat: no-repeat;
            /* background-size: cover; */
            background-position: 53% 66%;
            background-image:url({{ URL::asset('/imgs/booksbackground3.png') }});
            
        }
        #livros_title h1{
            padding: 1.5em;
            color: red;
            font-weight: 600;
        }
        #book_cover{
            /* border: 1px solid red;  */
            height: 24em;
            width: auto;
            /* background-image: url(/assets/imgs/pj22.jpg); */
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection