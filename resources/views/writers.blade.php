@extends('layouts.doctype')

@section('title', 'Livros')
    
@section('content')

<section class="container">
    <h1 class="red text-center" style="margin: 1em 0 1.5em 0;">Escritores</h1>

    
    
    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do Escritor</th>

                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{route('writers')}}" method="post">
                    @csrf
                    <td>

                    </td>
                    <td>
                        <i id="new_writer" style="color:#8F8F8F;">Adicione um Escritor</i>
                        <input type='text' id="writer_name" class='form-control' style="display:none;"
                        onclick="create_data()" name="writer_name" placeholder='Digite o nome do escritor'>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" id="create_btn" onclick="create_data()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                              </svg>
                        </button>
                        <button type="submit" class="btn btn-outline-primary" id="register_btn" 
                        name="writer_create" style="display:none;">Cadastrar</button>
                        
                    </td>
                </form>
                <td>
                    
                </td>
            </tr>

            <form action="{{route('writers')}}" method="post">
                    @csrf
                @php $i = 1; @endphp
                @foreach ($result as $row)
                    @php $id = $row->id; @endphp
                    {{-- <tbody> --}}
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td id="writerName{{$id}}"> {{ $row->writer_name }}</td>
                            <td>
                                {{-- Edit Btn --}}
                                <button type="button" class="btn btn-warning" 
                                id="edit_btn{{$id}}" onclick="edit_data({{$id}})">
                                Editar</button>
                                
                                {{-- Save Changes Btn --}}
                                <button type="button" class="btn btn-success" 
                                name="writer_update" id="save_btn{{$id}}" 
                                onclick="save_data({{$id}})" style="display:none;">Salvar</button>
                                
                                {{-- Delete Btn --}}
                                <button type="submit" class="btn btn-danger" 
                                id="delete_btn{{$id}}" value="{{$id}}" 
                                name="writer_delete" onclick="save_data()" 
                                style="display:none; margin:0 3em 0 1em;">Deletar</button>

                                {{-- Close Edit Btn --}}
                                <button type="button" class="btn btn-outline-danger"
                                id="close{{$id}}" onclick="close_btn({{$id}})" style="display:none;">
                                X</button>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    {{-- </tbody> --}}
                    @php $i++ @endphp
                @endforeach
            </form>
        </tbody>

    </table>
    
    {{-- @foreach ($result as $row)
        @php $id = $row->id; @endphp

        <div class="row" style="border:1px solid black;">
            <div class="col-2"></div>
            <div class="col-8 text-center" style="margin-top:.5em;">
                <p style="font-size:1.1em;" id="writerName{{$id}}">{{ $row->writer_name }}</p>
            </div>
            <div class="col-2" style="margin-top:.5em;">
                <button type="button" class="btn btn-warning" id="edit_btn{{$id}}" onclick="edit_data({{$id}})">Editar</button>
    
                <button type="button" class="btn btn-success" name="writer_create" id="save_btn{{$id}}" onclick="save_data({{$id}})" style="display:none;">Salvar</button>
            </div>
        </div>
    @endforeach --}}
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

{{--
        <div class="row ">
            <div class="col-4"></div>
            <div class="col-6" style="margin-top:.5em;">
                <p id="writerName{{$id}}">{{ $row->writer_name }}</p>
            </div>
            <div class="col-2" style="margin-top:.5em;">
                <button type="button" class="btn btn-warning" id="edit_btn{{$id}}" onclick="edit_data({{$id}})">Editar</button>
    
                <button type="button" class="btn btn-danger" name="writer_create" id="save_btn{{$id}}" onclick="save_data({{$id}})" style="display:none;">Salvar</button>
            </div>
        </div>

--}}