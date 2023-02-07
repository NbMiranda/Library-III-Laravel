@extends('layouts.doctype')

@section('title', 'Livros')
    


@section('content')
<section class="container">
    
    <div class="text-center" id="livros_title">
        <h1>Livros</h1>
    </div>

    {{-- collapse --}}
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Link with href
    </a>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
        <form action="" method="">
            <div class="row">
                <div class="col-6">
                    <label for="book_name" id="label">Nome do livro</label>
                    <input type="text" class="form-control" id="book_name" 
                    placeholder="Digite o nome do livro" name="book_name"">
                </div>
                <div class="col-4">
                    <label for="writer_id" id="label">Nome do Escritor</label>
                    <select name="" id="" class="form-select" aria-label="Default select example">
                        <option value="">-- Selecione o Escritor --</option>
                    </select>
                </div>
                {{-- writer CRUD link --}}
                <div class="col-2 text-center">
                    <a href="writerForm?page=1" class="btn btn-outline-danger"
                     id="writer_btn">Novo escritor</a>
                </div>
            </div>
        </form>
      </div>
    </div>
    
</section>

    <style>
        .card-body{
            background-color: #F5F5F5;
            border-color:red;
        }
        #livros_title{
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
        #writer_btn{
            margin-top: 2.74em;
            color: red;
            
        }
        #writer_btn:hover{
            background-color: red;
            color: #F5F5F5;
            transition: .3s
        }
    </style>
@endsection