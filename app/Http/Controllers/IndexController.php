<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $books = DB::table('books')
                    ->latest('created_at')
                    ->limit(9)
                    ->get();

        return view('index', compact('books'));
    }
}
