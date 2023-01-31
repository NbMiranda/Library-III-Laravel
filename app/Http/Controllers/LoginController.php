<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(){
        // $person = new Person();
        // $person->fill($request->all());
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $mail = $request->all();
        $user = User::where('email', $mail['email'])->first();
        // dd($request);

        if ($mail['login'] == 'login') {
        
            if ($user && $user->password == $mail['password']) {
                // session(['logged' => true]);
                return redirect()->route('contact');

            } else {
                // session(['logged' => false]);
                session(['msg' => 'Erro! Senha ou email incorreto!!']);
                return redirect()->route('login');
            }
        }

    }
}
