<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use \App\Models\Book;
use \App\Models\Rental;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    private $bookId;
    public function __construct(Request $request){
        $this->middleware('validation');
        $this->bookId = $id = $request->input('id');

    }
    public function rentals() {
        
        $books = Book::select('books.id', 'book_name', 'status' , 'book_cover', 'genre', 'writer_name')
        ->join('writers', 'books.writer_id', '=', 'writers.id')
        ->orderBy('book_name')->get();


        return view('rentals', compact('books'));
    }
    
    // RENT A BOOK
    public function rentBook() {

        // validando
        if (auth()->user()->rented_book == 5){
            session()->flash('book_fail', 'Você pode alugar no máximo 5 livros, devolva um livro para alugar outro');
            return redirect()->back();
        }
                    
        // Insert status on books table
        $book = Book::find($this->bookId);
        $book->status = "rented";
        
        // giving 1 book to rented_book
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $before = $user->rented_book;
        $user->rented_book = $before + 1;

        // Inserting datas on rentals table
        $rent = new Rental;
        
        $rent->user_id = auth()->user()->id;
        $rent->book_id = $this->bookId;
        $rent->expires_in = DB::raw('DATE_ADD(NOW(), INTERVAL 7 DAY)');

        // Saving...
        $book->save();
        $user->save();
        $rent->save();

        session()->flash('book_success', 'Livro alugado com sucesso');
        return redirect()->route('rentals');
        

    }

    // RETURN Book
    public function returnBook() {
        // changin book status
        $book = Book::find($this->bookId);
        $book->status = "rentable";
        
        // taking 1 book from rented_book
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $before = $user->rented_book;
        $user->rented_book = $before - 1;
        
        // add return date
        $return = Rental::where('book_id', $this->bookId)->latest()->first();
        $return->return_in =  DB::raw('CURRENT_TIMESTAMP');
        
        // Saving...
        $book->save();
        $user->save();
        $return->save();
        
        session()->flash('book_success', 'Livro devolvido com sucesso');
        return redirect()->back();
    }
}
