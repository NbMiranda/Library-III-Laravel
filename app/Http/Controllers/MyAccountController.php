<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CheckLoginMiddleware;

class MyAccountController extends Controller
{
    public function __construct(){
        $this->middleware(CheckLoginMiddleware::class);
    }
    public function myAccount(){
        return view('myAccount');
    }
}
