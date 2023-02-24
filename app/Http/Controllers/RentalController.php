<?php

namespace App\Http\Controllers;

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
        
        $books = DB::table('books')
        ->join('writers', 'books.writer_id', '=', 'writers.id')
        ->select('books.id', 'book_name', 'status' , 'book_cover', 'genre', 'writer_name')
        ->orderBy('book_name')->get();


        return view('rentals', compact('books'));
    }
    public function crud(Request $request) {

        $id = $request->input('id');

        // RENT
        if($request->has('rent')){
                    
        // Insert status on books table
        $book = Book::find($id);
        $book->status = "rented";
        
        // Inserting datas on rentals table
        $rent = new Rental;
        
        $rent->user_id = auth()->user()->id;
        $rent->book_id = $id;
        $rent->expires_in = DB::raw('DATE_ADD(NOW(), INTERVAL 7 DAY)');

        // Saving...
        $book->save();
        $rent->save();

        session()->flash('book_success', 'Livro alugado com sucesso');
        return redirect()->route('rentals');
        }

        // Return a book
        else if($request->has('return')){

            // changin book status
            $book = Book::find($id);
            $book->status = "rentable";
            $book->save();

            
            $return = Rental::where('book_id', $id)->latest()->first();
            // dd($return);
            $return->return_in = DB::raw('CURRENT_TIMESTAMP');
            $return->save();

            session()->flash('book_success', 'Livro devolvido com sucesso');
            return redirect()->route('rentals');
        }


    }
}
