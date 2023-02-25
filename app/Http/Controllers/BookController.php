<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Writer;
use \App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('validation');
    }
    public function books(){
        $writers = Writer::all();

        
        $books = DB::table('books')
        ->join('writers', 'books.writer_id', '=', 'writers.id')
        ->select('books.id', 'book_name', 'book_cover', 'genre', 'writer_name')
        ->orderBy('book_name')->get();
        



        return view('books', compact('writers', 'books'));
    }
    public function crud(Request $request) {
        $id = $request->input('id');

        if($request->has('book_create')){
            // dd($request->all());
            $book = new Book;
            $book->book_name = $request->input('book_name');
            $book->writer_id = $request->input('writer_id');
            $book->genre = $request->input('genre');
            $book->book_cover = "imagemPadrao.png";
            $book->synopsis = "Adicione uma sinopse ao seu livro ";
            $book->status = "rentable";

            $book->save();
            session()->flash('book_success', 'Livro inserido com sucesso');
            
            return redirect()->back();

        }
        else if($request->has('book_update')){
            // dd($request->all());
            $book = Book::find($id);
            $book->update($request->all());
            session()->flash('book_success', 'Livro atualizado com sucesso');
        }
        else if($request->has('delete_book')){

            $id = $request->input('delete_book');
            
            $book = Book::find($id);

            if($book->status == "rented") {
                session()->flash('book_fail', 'erro');
                return redirect()->back();
            }
            else{
                $book->delete();

                session()->flash('book_success', 'Livro deletado com sucesso');
                return redirect()->route('books');
            }
            
                
        }
        else if($request->has('addBookCover')){
            $requestImage = $request->file('EditFile');
            // $id = $request->input('id');
            // Criando nome unico para a imagem
            $extension = $requestImage->extension();
            $imageName = $requestImage->getClientOriginalName() . strtotime("now") . "." . $extension;
    
            // Movendo para pasta separa no projeto
            $requestImage->move(public_path('imgs/book_covers'), $imageName); 
            
            // inserindo o nome no banco de dados
            $book = Book::find($id);
            
            $book->book_cover = $imageName;
            $book->save();
            return redirect()->back();
        }
        else if($request->has('deleteBookCover')){
            $book = Book::find($id);
            $book->update(['book_cover' => 'imagemPadrao.png']);
            return redirect()->back();
        }

    }
    
}
