@extends('layouts.doctype')

@section('title', 'Contact');

@section('content')
    
    <div class="container">
      <h1>Contato</h1>
      <form>
        <input type="text" placeholder="Nome">
        <input type="text" placeholder="E-mail">
        <textarea placeholder="Mensagem"></textarea>
        <input type="submit" value="Enviar">
      </form>
    </div>
    <style>
        h1 {
          color: red;
          text-align: center;
        }
        form {
          display: flex;
          flex-direction: column;
          align-items: center;
        }
        input[type="text"],
        textarea {
          width: 100%;
          padding: 10px;
          margin-bottom: 20px;
          border: 1px solid red;
          font-size: 16px;
        }
        input[type="submit"] {
          background-color: red;
          color: white;
          padding: 10px 20px;
          border: none;
          cursor: pointer;
        }
      </style>
@endsection