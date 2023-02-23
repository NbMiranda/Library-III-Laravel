<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function __construct(){
        $this->middleware('validation');
    }
    public function rentals() {
        return view('rentals');
    }
}
