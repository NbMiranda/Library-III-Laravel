@extends('layouts.doctype')

@section('title', 'Minha conta')
    
@section('content')
    <section class="container">
        <div class="row" style="margin-bottom: 22.7vh;">
            <div class="col-3" id="user_content">
                <div id="user_data_image" style="background-image: url({{ URL::asset('/imgs/user_images/'.$userImage) }}) ;">
                    <div id="edit_btn">
                        <button class="btn btn-link" type="button" id="change_image" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        
                        {{-- Dropdown menu --}}
                        <ul class="dropdown-menu">
                            <li>
                                {{-- button trigger Modal --}}
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Adicionar Foto de Perfil 
                                </a>
                            </li>
                            @if (auth()->user()->user_image != "redperson.png")
                                <li><a class="dropdown-item" href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal1">Remover imagem</a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                <h3 style="margin-left: 6.5em;">{{ auth()->user()->name }}</h3>
            </div>

            <div class="col-2"></div>

            {{-- rented books --}}

            <div class="col-sm-12 col-md-12 col-lg-7 text-center" style="margin-top: 4vh;">
                <h3 class="red" style="padding: 1em;">Livros Alugados por {{auth()->user()->name}}</h3>
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do Livro</th>
                        {{-- <th scope="col">Expira em</th> --}}
                        <th scope="col">Devolva o livro</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $books->count(); $i++)
                            <tr>
                                <th scope="row">{{$i+1}}</th>
                                <td>{{$books[$i]->book_name}}</td>
                                
                                <td>
                                    {{-- return a book form --}}
                                    <form action="{{route('returnBook')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$books[$i]->id}}">
                                        
                                        <div class="row">
                                            <div class="col-4"></div>
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-outline-danger" id="returnBtn"
                                                name="return">Devolva este livro!</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>  
                        @endfor
                    </tbody>
                  </table>
            </div>
        </div>
                    
        {{-- Modal --}}
        <form action="{{ route('myAccount') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Book cover Modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Adicionar imagem de perfil
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label" for="user_image">Imagem de Perfil</label>
                        <input type="file" class="form-control" id="user_image" name="user_image" accept="image/*"/>   
                        <div id='userImage'>
                            {{-- Book cover show --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="addUserImage" class="btn btn-primary">Salvar</button>
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
                        Confirmar exclus??o
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja mesmo remover imagem de perfil?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="deleteUserImage" class="btn btn-danger">Remover</button>
                    </div>
                </div>
                </div>
            </div>
        </form>

    </section>
    @include('layouts.components.footer')
    
    {{-- Image display --}}
    <script>
        const userImage = document.querySelector("#user_image");
        var uploadedImage = "";

        userImage.addEventListener("change", function(){
            const editReader = new FileReader();
            console.log(editReader);
            editReader.addEventListener("load", () => {
                uploadedImage = editReader.result;
                document.querySelector("#userImage").style.backgroundImage = `url(${uploadedImage})`;
            });
            editReader.readAsDataURL(this.files[0]);
        })
    </script>
@endsection