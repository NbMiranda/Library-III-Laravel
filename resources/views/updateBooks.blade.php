@extends('layouts.doctype')

@section('title', 'Atualizar Livro')
    

@section('content')
    @php
        $book = $books[0]
    @endphp
    <section class="container">
        <h1 class="red text-center" style="margin:2em;"><i id="bookH1">{{$book->book_name}}</i>
            {{-- Update Btn --}}
            <button type="button" class="btn" id="updateBookBtn" onclick="updateBook()">
                <i class="fa-sharp fa-solid fa-pen" id="icons"></i>
            </button>

            {{-- Close Btn --}}
            <button type="button" class="btn" id="closeBookBtn" style="display:none;" 
            onclick="closeBook()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </h1> 

        

        <form action="{{route('books')}}" method="post">
            @csrf
            <div class="row">
                {{-- Book cover --}}
                <div class="col-5 text-center d-flex justify-content-center">
                    <div id="book_cover">
                            
                    </div>
                </div>
                
                <div class="col-5">
                    {{-- Book Name --}}
                    <label class="red" id="label" for="">Título do Livro</label>
                    <h3 id="book_title">{{$book->book_name}}</h3>

                    {{-- Writer Name --}}
                    <label class="red" id="label" for="">Escritor</label>
                    <h3 id="writer_name">{{$book->writer_name}}</h3>

                    {{-- writer select --}}
                    <select name="writer_id" id="writer_select_update" class="form-select" style="display:none; " aria-label="Default select example" required>
                        
                        <option value="">-- Selecione o Escritor --</option> 
                        @foreach ($writers as $item)
                            {{-- Pre selecting writer --}}
                            @if ($book->writer_name == $item->writer_name)
                                <option value="{{$item->id}}" selected>{{ $item->writer_name }}</option>
                    
                            @else
                                <option value="{{$item->id}}">{{ $item->writer_name }}</option>
                    
                            @endif
                        
                        @endforeach
                    </select>

                    {{-- Genres --}}
                    <label class="red" id="label" for="">Gêneros</label>
                    <h3 id="genres">{{$book->genre}}</h3>


                    {{-- sinopse modal --}}
                    <h4 style="margin-bottom: .7em;"><a href="#" id="links">+ Sinopse</a></h4>

                    {{-- Save Btn --}}
                    <button type="button" class="btn btn-outline-primary" id="save_book"
                    onclick="updateBookData({{$book->id}})" style="display:none;">
                        Save
                    </button>

                    {{-- Delete Btn --}}
                    <button type="submit" class="btn btn-outline-danger" id="delete_book"
                    name="delete_book" value="{{$book->id}}" style="display:none;">
                        <i class="fa-solid fa-trash" id="icons"></i>
                    </button>

                </div>
                {{-- Sinopse --}}
                <div class="col-2">
                    {{-- <textarea class="form-control" name="" id="" cols="40" rows="10"></textarea> --}}
                </div>
            </div>
        </form>




    </section>
    <style>
        #book_cover{
        border: 1px solid red; 
        height: 26em;
        width: 18em;
        /* background-image: url(/assets/imgs/pj22.jpg); */
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        }

        #book_title, #writer_name, #writer_select_update, #genres{
            margin-bottom: 1.2em;
        }
    </style>
@endsection



