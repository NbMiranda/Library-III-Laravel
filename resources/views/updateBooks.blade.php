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

        
        <form action="{{route('books')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$book->id}}">
            <div class="row">
                {{-- Book cover --}}
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div id="book_cover" style="background-image: url({{ URL::asset('/imgs/book_covers/'.$book->book_cover) }}) ;">
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
                    </div>
                    
                </div>

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

                    {{-- Delete Book cover Modal --}}
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModal1Label">
                                Olá
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Deseja mesmo deletar?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" name="deleteBookCover" class="btn btn-primary">Deletar</button>
                            </div>
                        </div>
                        </div>
                    </div>
                
                <div class="col-4">
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

                    {{-- Save Btn --}}
                    <button type="button" name="updateBook" class="btn btn-outline-primary" id="save_book"
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
                <div class="col-4">
                    <label class="red" id="label" for="synopsis">Sinopse</label>
                    <p id="synopsis_text">{{$book->synopsis}}</p>

                    <textarea class="form-control" name="synopsis" id="synopsis" 
                    style="display: none;" cols="40" rows="15">{{$book->synopsis}}</textarea>
                </div>
            </div>
        </form>

        {{-- rent form --}}
        @if ($book->status == "rentable")
            <form action="{{route('rentals')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$book->id}}">
                
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        {{-- <input type="hidden" value="2"> --}}
                        {{-- Rent Btn --}}
                        <button type="submit" class="btn btn-primary" id="rentBtn"
                        name="rent">Alugue este livro!</button>
                    </div>
                </div>
            </form>
        @endif

        @foreach ($rentals as $line)
            @if ($book->id == $line->book_id && auth()->user()->id == $line->user_id && $line->return_in == null)
                {{-- return form --}}
                <form action="{{route('rentals')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$book->id}}">
                    
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary" id="rentBtn"
                            name="return">Devolva este livro!</button>
                        </div>
                    </div>
                </form>                
            @endif
        @endforeach
        
    </section>
    <style>
        #rentBtn{
            position: relative;
            bottom: 14vh;
        }
        #bookCover{
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
        width: 17.3em;
        height: 26em;
        margin: 1vh 0 0 12.5vh;
        border-radius: 10px;   
        }
        #change_cover{
        position: relative;
        top: 27vh;
        left: 18vh;
        /* border: 1px solid black; */
        border-radius: 20px;
        background-color: #0000002b;
        width: 1em;
        width: 38px;
        color: red;
        transition: .4s;
        }
        #change_cover:hover{
        color: #c00000;
        transition: .4s;
        }
        #book_cover{
        height: 26em;
        width: 17.3em;
        /* position: relative; */
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
        border-radius: 5px;
        margin-bottom: 4em;
        
        }

        #book_title, #writer_name, #writer_select_update, #genres{
            margin-bottom: 1.2em;
        }
    </style>
@endsection



