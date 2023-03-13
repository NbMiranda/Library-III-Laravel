<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Writer;
use \App\Models\Book;


class BookController extends Controller
{
    private $bookId;
    public function __construct(Request $request){
        $this->middleware('validation');
        $this->bookId = $request->input('id');
        
    }
    public function books(){

        // send all the writers and books to view
        $writers = Writer::all();

        $books = Book::select('books.id', 'book_name', 'book_cover', 'genre', 'writer_name')
        ->join('writers', 'books.writer_id', '=', 'writers.id')
        ->orderBy('book_name')->get();
        

        return view('books', compact('writers', 'books'));
    }

    // CREATE Book
    public function create(Request $request) {
    
        Book::create($request->all());
        session()->flash('book_success', 'Livro inserido com sucesso');
        
        return redirect()->back();
    }
    
    // UPDATE Book
    public function update(Request $request) {

        $book = Book::find($this->bookId);
        $book->update($request->all());
        session()->flash('book_success', 'Livro atualizado com sucesso');
    }

    // DELETE Book
    public function delete() {
            
        $book = Book::find($this->bookId);
        $book->forceDelete();

        session()->flash('book_success', 'Livro deletado com sucesso');
        return redirect()->route('books'); 
    }
    
    // ADD Book Cover
    public function addBookCover(Request $request) {
        
        $requestImage = $request->file('EditFile');
            
        // Criando nome unico para a imagem
        $extension = $requestImage->extension();
        $imageName = $requestImage->getClientOriginalName() . strtotime("now") . "." . $extension;
    
        // Movendo para pasta separa no projeto
        $requestImage->move(public_path('imgs/book_covers'), $imageName); 
        
        // inserindo o nome no banco de dados
        $book = Book::find($this->bookId);
        
        $book->book_cover = $imageName;
        $book->save();
        return redirect()->back();
    }
    
    // DELETE Book Cover
    public function delBookCover() {

        $book = Book::find($this->bookId);
        $book->update(['book_cover' => 'imagemPadrao.png']);
        return redirect()->back();
    } 
}
