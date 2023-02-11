@extends('layouts.doctype')

@section('title', 'Livros')
    
@section('content')

<section class="container">
    <h1 class="red text-center" style="margin: 1em 0 1.5em 0;">Escritores</h1>

    
    
    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col-2">#</th>
                <th scope="col-6">Nome do Escritor</th>

                <th scope="col-4">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{route('writers')}}" method="post">
                    @csrf
                    <td>
                        0
                    </td>
                    <td>
                        <i id="new_writer" style="color:#8F8F8F;">Adicione um Escritor</i>
                        <input type='text' id="writer_name" class='form-control' style="display:none;"
                        onclick="create_data()" name="writer_name" placeholder='Digite o nome do escritor'>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary" style="border:none;" id="create_btn" onclick="create_data()">
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
                                <button type="button" class="btn btn-outline-warning" 
                                id="edit_btn{{$id}}" onclick="edit_data({{$id}})" style="border:none;color:black;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                                
                               {{-- Save Changes Btn --}}
                                <button type="button" class="btn btn-outline-success" 
                                name="writer_update" id="save_btn{{$id}}" 
                                onclick="save_data({{$id}})" style="display:none; border:none;">
                                    <i class="fa-solid fa-floppy-disk" style="font-size: 22px;"></i>

                                </button>
                                                    
                                
                            </td>
                            <td>
                                {{-- Delete Btn --}}
                                <button type="submit" class="btn btn-outline-danger" 
                                id="delete_btn{{$id}}" value="{{$id}}" 
                                name="writer_delete" onclick="save_data()" 
                                style="display:none; border:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>

                                {{-- Close Edit Btn --}}
                                <button type="button" class="btn btn-outline-dark"
                                id="close{{$id}}" onclick="close_btn({{$id}})" style="display:none; border:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                    </svg>
                                </button>
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