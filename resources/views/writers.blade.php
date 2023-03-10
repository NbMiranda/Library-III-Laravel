@extends('layouts.doctype')

@section('title', 'Escritores')
    
@section('content')

<section class="container">
    <h1 class="red text-center" style="margin: 1em 0 1.5em 0;">Escritores</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do Escritor</th>

                <th scope="col" class="text-center">Ações</th>
                <th scope="col" id="th_text" style="display:none;">Deletar/Cancelar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{route('writerCreate')}}" method="post">
                    @csrf
                    <td>
                        
                    </td>
                    <td>
                        <i id="new_writer" style="color:#8F8F8F;">Adicione um Escritor</i>
                        <input type='text' id="writer_name" class='form-control' style="display:none;"
                        onclick="create_data()" name="writer_name" placeholder='Digite o nome do escritor'>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-primary" style="border:none;" id="create_btn" onclick="create_data()">
                            <i class="fa-solid fa-user-plus" id="icons"></i>
                        </button>

                        <button type="submit" class="btn btn-outline-primary text-center" id="register_btn" 
                        name="writer_create" style="display:none;">Cadastrar</button>
                        
                    </td>
                    
                </form>
                <td>
                    <button type="button" class="btn btn-outline-dark"
                    onclick="close_create_data()" id="create_data_btn" style="display:none; border:none;">
                        <i class="fa-sharp fa-solid fa-xmark" id="icons"></i>
                        
                    </button>
                   
                </td>
            </tr>

            
                @php $i = $result->firstItem(); @endphp
                @foreach ($result as $row)
                    @php $id = $row->id; @endphp
                    {{-- <tbody> --}}
                        <tr style="height: 3.5em;">

                            <form action="{{route('writerUpdate')}}" method="post">
                                @csrf

                            <th scope="row" style="width: 7.1em;">{{ $i }}</th>
                            <td id="writerName{{$id}}" style="width: 41.5em;"> {{ $row->writer_name }}</td>
                            <td class="text-center">
                                {{-- Edit Btn --}}
                                <button type="button" class="btn btn-outline-warning" 
                                id="edit_btn{{$id}}" onclick="edit_data({{$id}})" style="display:inline; border:none;color:black;">
                                    <i class="fa-solid fa-user-pen" id="icons"></i>
                                </button>
                                
                               {{-- Save Changes Btn --}}
                                <button type="button" class="btn btn-outline-success" name="writerSave" 
                                name="writer_update" id="save_btn{{$id}}" 
                                onclick="save_data({{$id}})" style="display:none; border:none;">
                                    <i class="fa-sharp fa-solid fa-floppy-disk" style="font-size: 24px"></i>

                                </button>
                            </td>
                            </form>
                            
                            {{-- Delete Form --}}
                            <form action="{{route('writerDelete')}}" method="post">
                                @csrf
                            <td>
                    
                                {{-- Delete Btn --}}
                                <button type="submit" class="btn btn-outline-danger" 
                                id="delete_btn{{$id}}" value="{{$id}}" 
                                name="writer_delete" 
                                style="display:none; border:none;">
                                    <i class="fa-solid fa-trash" id="icons"></i>
                                </button>

                                {{-- Close Edit Btn --}}
                                <button type="button" class="btn btn-outline-dark"
                                id="close{{$id}}" onclick="close_btn({{$id}})" style="display:none; border:none;">
                                    <i class="fa-sharp fa-solid fa-xmark" id="icons"></i>
                                </button>
                            </td>
                            </form>
                        </tr>
                    {{-- </tbody> --}}
                    @php $i++ @endphp
                @endforeach                
            
        </tbody>
        

    </table>

    {{-- Pagination --}}
    <div class="text-center">

        {{-- <a href="writers?page={{$result->currentPage()-1}}">
            
        </a> --}}
        {{-- {{dd($result)}} --}}
        @if (!$result->onFirstPage())
            <a href="writers?page={{$result->currentPage()-1}}">
                <i class="fa-solid fa-backward" id="pageNav"></i>
            </a>             
        @endif
        
        @for ($j = 0;$j < $result->lastPage(); $j++)
            @if ($j+1 == $result->currentPage())
                <a href="writers?page={{$j+1}}">
                    <i class="bi bi-{{$j+1}}-circle" style="color:red;" id="pageNav"></i>
                </a>
            @else
                <a href="writers?page={{$j+1}}" class="active">
                    <i class="bi bi-{{$j+1}}-circle" id="pageNav"></i>
                </a>
            @endif

        @endfor
        @if (!$result->onLastPage())
            <a href="writers?page={{$result->currentPage()+1}}">
                <i class="fa-solid fa-forward" id="pageNav"></i> 
            </a> 
        @endif
        {{-- {{ $arrayId[5] }} --}}

        
        {{-- {{ dd($firstItem) }} --}}
    </div>

    <script>
        window.arrayId = {!! json_encode($arrayId) !!};
        window.firstItem = "{{ $firstItem }}";
        window.count = "{{ $count }}";
    </script>
    {{-- {{ dd($firstItem) }} --}}
    {{-- {{ dd(dd($result->count())) }} --}}

</section>
{{-- @include('layouts.components.footer')  --}}


@endsection
