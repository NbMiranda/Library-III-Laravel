<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use \App\Models\Book;
use \App\Models\Rental;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    public function __construct(){
        $this->middleware('validation');
    }
    public function rentals() {
        
        $books = Book::select('books.id', 'book_name', 'status' , 'book_cover', 'genre', 'writer_name')
        ->join('writers', 'books.writer_id', '=', 'writers.id')
        ->orderBy('book_name')->get();


        return view('rentals', compact('books'));
    }
    public function crud(Request $request) {

        $id = $request->input('id');


        // RENT A BOOK
        if($request->has('rent')){

        // validando
        if (auth()->user()->rented_book == 5){
            session()->flash('book_fail', 'Você pode alugar no máximo 5 livros, devolva um livro para alugar outro');
            return redirect()->back();
        }
                    
        // Insert status on books table
        $book = Book::find($id);
        $book->status = "rented";
        
        // giving 1 book to rented_book
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $before = $user->rented_book;
        $user->rented_book = $before + 1;
        

        // Inserting datas on rentals table
        $rent = new Rental;
        
        $rent->user_id = auth()->user()->id;
        $rent->book_id = $id;
        $rent->expires_in = DB::raw('DATE_ADD(NOW(), INTERVAL 7 DAY)');

        // Saving...
        $book->save();
        $user->save();
        $rent->save();

        session()->flash('book_success', 'Livro alugado com sucesso');
        return redirect()->route('rentals');
        }

        // RETURN A BOOK
        else if($request->has('return')){

            // changin book status
            $book = Book::find($id);
            $book->status = "rentable";
            
            // taking 1 book from rented_book
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $before = $user->rented_book;
            $user->rented_book = $before - 1;
            
            // add return date
            $return = Rental::where('book_id', $id)->latest()->first();
            $return->return_in =  DB::raw('CURRENT_TIMESTAMP');
            
            // Saving...
            $book->save();
            $user->save();
            $return->save();
            
            session()->flash('book_success', 'Livro devolvido com sucesso');
            return redirect()->back();
        }
    }
}
