@extends('layouts.doctype')

@section('title', 'Livros')
    


@section('content')

<section class="container">
    <h1 class="text-center" style="margin: 1em 0 2em 0;">Escritores</h1>

    <div class="row">
        
        <div class="col-6 text-center">
            <h3 style="margin-bottom:1em; color:red;">Escritores</h3>
            @foreach ($result as $row)
                <p>{{ $row->writer_name }}</p> 
                
            @endforeach
        </div>
        {{-- New Writer --}}
        <div class="col-6">
            <h3 class="text-center" style="margin-bottom: 1em;">Cadastre seu escritor</h3>
            <form action="{{ route('writers') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" id="writer_name" name="writer_name" class="form-control" required>
                        <label class="form-control-placeholder" for="writer_name">Nome do escritor</label>

                        <button type="submit" class="btn btn-outline-danger" name="writer_create" id="button-addon2">
                            Cadastrar
                        </button>

                    </div>
                </div>
            </form>
        
            {{-- Update Writer --}}
            <h3 class="text-center" style="margin:1em;">Edite o escritor</h3>
            <form action="{{ route('writers') }}" method="post">
                @csrf
                <select class="form-select" aria-label="Default select example" name="new_writer" id="new_writer" style="margin-bottom:1.5em;">
                    <option value="">-- Selecione o escritor --</option>
                    @foreach ($result as $row)
                        <option value={{ $row->id }}">{{ $row->writer_name }}</option>;
                        
                    @endforeach
                </select>
                <div class="form-group">
                    <input type="text" id="new_writer_name" name="writer_name" class="form-control" required>
                    <label class="form-control-placeholder" for="new_writer_name">Novo nome do escritor</label>
                </div>
                <button type="submit" class="btn btn-outline-danger" name="writer_update">Atualizar</button>
            </form>

            {{-- Delete Writer --}}
            <h3 class="red text-center">Delete um escritor</h3>
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" style="width:100%; margin-top:1.5em;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Delete
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('writers') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h1 class="red modal-title fs-5" id="staticBackdropLabel">Delete um escritor</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <select class="form-select" aria-label="Default select example" name="" id="" style="margin-bottom:1.5em;">
                                    <option value="">-- Selecione o escritor --</option>
                                    @foreach ($result as $row)
                                    <option value={{ $row->id }}">{{ $row->writer_name }}</option>;
                                    
                                    @endforeach
                                </select>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="writer_delete" class="btn btn-danger">Deletar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>

</section>

<style>
    .form-group {
    position: relative;
    margin-bottom: 1.5rem;
    }

    .form-control-placeholder {
    position: absolute;
    top: 0;
    padding: 7px 0 0 13px;
    transition: all 200ms;
    opacity: 0.5;
    }

    .form-control:focus + .form-control-placeholder,
    .form-control:valid + .form-control-placeholder {
    font-size: 75%;
    transform: translate3d(0, -100%, 0);
    opacity: 1;
    }

</style>

@endsection