<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Writer;
use \App\Models\Book;
use App\Models\Rental;
use Illuminate\Support\Facades\DB;

class updateBookController extends Controller
{
    public function updateBook($id){
        $writers = Writer::all();
        
        $rentals = Rental::all();

        $books = DB::table('books')
        ->join('writers', 'books.writer_id', '=', 'writers.id')
        ->where('books.id', '=', $id)
        ->select('books.id', 'book_name', 'genre', 'status' ,'book_cover' , 'synopsis', 'writer_name')
        ->orderBy('book_name')->get();

        // $books = DB::table('rentals')
        // ->join('books', 'rentals.book_id', '=', 'books.id')
        // ->join('writers', 'books.writer_id', '=', 'writers.id')
        // ->where('rentals.book_id', '=', $id)
        // ->select('books.id', 'book_name', 'book_cover', 'status', 'genre', 'writer_name', 'writers.id as writer_id')
        // ->orderBy('book_name')
        // ->get();

        return view('updateBooks', compact('writers', 'books', 'rentals'));
    }
}
