<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('validation');
    }
    public function books(){
        return view('books');
    }
    
}
