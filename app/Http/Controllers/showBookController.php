<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Writer;
use \App\Models\Book;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class showBookController extends Controller
{
    public function showBook($id){
        $writers = Writer::all();
        
        $rentals = Rental::all();

        $books = Book::select('books.id', 'book_name', 'genre', 'status' ,'book_cover' , 'synopsis', 'writer_name')
        ->join('writers', 'books.writer_id', '=', 'writers.id')
        ->where('books.id', '=', $id)
        ->orderBy('book_name')->get();


        return view('showBook', compact('writers', 'books', 'rentals'));
    }
}
