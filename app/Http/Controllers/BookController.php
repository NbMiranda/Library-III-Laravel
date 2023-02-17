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
        ->select('books.id', 'book_name', 'genre', 'writer_name')
        ->orderBy('book_name')->get();
        



        return view('books', compact('writers', 'books'));
    }
    public function crud(Request $request) {


        if($request->has('book_create')){
            // dd($request->all());
            $book = new Book;
            $book->book_name = $request->input('book_name');
            $book->writer_id = $request->input('writer_id');
            $book->genre = $request->input('genre');


            $book->save();
            return redirect()->back();
            
        }
        // else if($request->has('writer_delete')){
        //     $id = $request->input('writer_delete');
            
        //     $writer = Writer::find($id);
        //     $writer->delete();
        //     return redirect()->back();
                
        // }
        // else{
        //     $id = $request->input('id');
        //     $writer = Writer::findOrFail($id);
        //     $writer->update($request->all());
        // }
    }
    
}
