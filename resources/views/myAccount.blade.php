@extends('layouts.doctype')

@section('title', 'Minha conta')
    
@section('content')
    <section class="container">
        <div id="user_content">
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

            <h4 class="text-center">{{ auth()->user()->name }}</h4>
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
                        Olá
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja mesmo remover?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="deleteUserImage" class="btn btn-primary">Remover</button>
                    </div>
                </div>
                </div>
            </div>
        </form>

    </section>
    @include('layouts.components.footer')
    <style>
        #userImage{
            height: 40vh;
            border: 3px solid red;
            width: 40vh;
            border-radius: 53%;
            margin-top: 5vh;
            margin-left: 9vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #user_content{
            /* background-color: red; */
            height: 91vh !important;
            width: 24em;
            /* margin-top: 2em; */
        }
        #user_data_image{
            border-radius: 50%;
            width: 20em;
            height: 20em;
            margin: 0 0 1em 2.5em;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* position: relative; */
        }
        #edit_btn{
            
            width: 5em;
            height: 5em;
            
            /* background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */
            position: relative; 
        }
        #change_image{
            position: absolute;
            top: 37vh;
            left: 32vh;
            /* border: 1px solid black; */
            border-radius: 20px;
            background-color: #0000002b;
            width: 1em;
            width: 38px;
            color: red;
            transition: .4s;
        }
        #change_image:hover{
            color: #b40101;
            transition: .4s;

        }
    </style>
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