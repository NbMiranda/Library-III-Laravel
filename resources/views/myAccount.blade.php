@extends('layouts.doctype')

@section('title', 'Minha conta')
    
@section('content')
    <section class="container">
        <div id="user_content">
            <div id="user_data_image" style="background-image: url({{ URL::asset('/imgs/user_images/'.$userImage) }}) ;">
                <div id="edit_btn">
                    <button class="btn btn-link" type="button" id="change_image">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </div>


            </div>
            
            <h4 class="text-center">{{ auth()->user()->name }}</h4>

            <form action="{{ route('myAccount') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" id="user_image" name="user_image" accept="image/*"/>   
                <button type="submit" class="btn">Vai</button>             
            </form>
        </div>
    </section>
    @include('layouts.components.footer')
    <style>
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
            top: 17em;
            left: 15em;
            border: 1px solid black;
            border-radius: 20px;
            background-color: black;
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
@endsection