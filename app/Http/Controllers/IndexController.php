<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    // returning last 9 books on db
    public function index(){
        $books = Book::latest('created_at')->limit(9)->get();

        return view('index', compact('books'));
    }
}
