@extends('layouts.doctype')

@section('title', 'Atualizar Livro')
    

@section('content')
    @php
        $book = $books[0]
    @endphp
    
    @if (session('book_fail'))
        <div class="alert alert-danger alert-dismissible fade show" 
        id="fail-message" role="alert" style="width: 42vh;">
            {{session('book_fail')}}
        </div>
    @endif
    
    <section class="container">
        <h1 class="red text-center" style="margin:2em;"><i id="bookH1">{{$book->book_name}}</i>
            {{-- checking if the book is rented to able to edit --}}
            @if ($book->status == "rentable")
                {{-- Update Btn --}}
                <button type="button" class="btn" id="updateBookBtn" onclick="updateBook()">
                    <i class="fa-sharp fa-solid fa-pen" id="icons"></i>
                </button>
            @endif
            
            
            {{-- Close Btn --}}
            <button type="button" class="btn" id="closeBookBtn" style="display:none;" 
            onclick="closeBook()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </h1> 

            <div class="row">
                
                {{-- Book cover --}}
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div id="book_cover_ub" style="background-image: url({{ URL::asset('/imgs/book_covers/'.$book->book_cover) }}) ;">
                        {{-- checking if the book is rented to able to edit --}}
                        @if ($book->status == "rentable")
                            <div id="edit_btn">
                                {{-- Book cover Btn --}}
                                <button class="btn btn-link " type="button" id="change_cover"  data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                {{-- Dropdown menu --}}
                                <ul class="dropdown-menu">
                                    <li>
                                        {{-- button trigger Modal --}}
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Adicionar Capa 
                                        </a>
                                    </li>
                                    @if ($book->book_cover != "imagemPadrao.png")
                                        <li><a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal1">Deletar imagem</a></li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        
                    </div>
                    
                </div>
                
                {{-- CREATE BookCover Form --}}
                <form action="{{route('addBookCover')}}" method="post" enctype="multipart/form-data" id="no_space">
                    @csrf
                    <input type="hidden" name="id" value="{{$book->id}}">
                    {{-- Book cover Modal --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                Adicionar capa Para o livro
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label class="form-label" for="EditFile">Capa do Livro</label>
                                <input type="file" class="form-control" id="EditFile" name="EditFile" accept="image/*"/>
                                <div id='bookCover'>
                                    {{-- Book cover show --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="addBookCover" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>

                {{-- DELETE BookCover Form --}}
                <form action="{{route('delBookCover')}}" method="post" enctype="multipart/form-data" id="no_space">
                    @csrf
                    <input type="hidden" name="id" value="{{$book->id}}">

                    {{-- Delete Book cover Modal --}}
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModal1Label">
                                Confirmar exclusão
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Deseja mesmo deletar a capa do livro?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="deleteBookCover" class="btn btn-danger">Deletar</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                
                {{-- UPDATE Book Form --}}
                <div class="col-4">
                    <form action="{{route('bookUpdate')}}" method="post">
                        @csrf
                        {{-- Book Name --}}
                        <label class="red" id="label" for="">Título do Livro</label>
                        <h3 id="book_title">{{$book->book_name}}</h3>

                        {{-- Writer Name --}}
                        <label class="red" id="label" for="">Escritor</label>
                        <h3 id="writer_name">{{$book->writer_name}}</h3>

                        {{-- writer select --}}
                        <select name="writer_id" id="writer_select_update" class="form-select" style="display:none; " aria-label="Default select example">
                            
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

                        {{-- Save Btn --}}
                        <button type="button" name="updateBook" class="btn btn-outline-success" id="save_book"
                        onclick="updateBookData({{$book->id}})" style="display:none; margin:5px; width:13vh;">
                            <i class="fa-sharp fa-solid fa-floppy-disk" id="icons"></i> Salvar
                        </button>
                    </form>

                    {{-- RENT Form --}}        
                    @if ($book->status == "rentable")
                        <form action="{{route('rentBook')}}" method="post" id="no_space">
                            @csrf
                            <input type="hidden" name="id" value="{{$book->id}}">
                            
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    {{-- <input type="hidden" value="2"> --}}
                                    {{-- Rent Btn --}}
                                    <button type="submit" class="btn btn-info" id="rentBtn"
                                    name="rent">Alugue este livro!</button>
                                </div>
                            </div>
                        </form>
                    @endif

                    @foreach ($rentals as $line)
                        @if ($book->id == $line->book_id && auth()->user()->id == $line->user_id && $line->return_in == null)
                            {{-- return form --}}
                            <form action="{{route('returnBook')}}" method="post" id="no_space">
                                @csrf
                                <input type="hidden" name="id" value="{{$book->id}}">
                                
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-warning" id="rentBtn"
                                        name="return">Devolva este livro!</button>
                                    </div>
                                </div>
                            </form>                
                        @endif
                    @endforeach

                    {{-- DELETE Form --}}
                    <form action="{{route('bookDelete')}}" method="post" id="no_space">
                        @csrf
                        <input type="hidden" name="id" value="{{$book->id}}">

                        {{-- Delete Btn --}}
                        <button type="submit" class="btn btn-outline-danger" id="delete_book"
                        name="delete_book" value="{{$book->id}}" style="display:none; width:13vh;">
                            <i class="fa-solid fa-trash" id="icons"></i> Deletar
                        </button>
                    </form>

                </div>
                {{-- Sinopse --}}
                <div class="col-4">
                    <label class="red" id="label" for="synopsis">Sinopse</label>
                    <p id="synopsis_text">{{$book->synopsis}}</p>

                    <textarea class="form-control" name="synopsis" id="synopsis" 
                    style="display: none;" cols="40" rows="15">{{$book->synopsis}}</textarea>
                </div>
            </div>
        



        
    </section>

    <style>

    </style>

    <script>
        setTimeout(function() {
            $('#fail-message').remove();
        }, 5000);

    </script>

@endsection



