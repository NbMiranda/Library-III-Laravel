<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function register(){
        return view('register');
    }
    public function store(Request $request){
        // dd($request);
        $user = new User;
        $user->fill($request->all());
        $user->save();
        return redirect()->route('login');
    }
}
