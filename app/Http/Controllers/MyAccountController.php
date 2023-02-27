<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyAccountController extends Controller
{
    public function __construct(){
        $this->middleware('validation');
    }
    public function myAccount(){
        $id = auth()->id();
        $userImage = User::find($id)->user_image;
        
        $books = DB::table('rentals')
            ->join('books', 'rentals.book_id', '=', 'books.id')
            ->where('rentals.user_id', $id)
            ->whereNull('rentals.return_in')
            ->select('books.book_name', 'books.id')
            ->get();
        // dd($userImage);
        return view('myAccount', compact('userImage', 'books'));
    }

    public function updatePhoto(Request $request){
        
        switch (true) {
            case $request->has('addUserImage'):
                $requestImage = $request->file('user_image');

                // Criando nome unico para a imagem
                $extension = $requestImage->extension();
                $imageName = $requestImage->getClientOriginalName() . strtotime("now") . "." . $extension;
        
                // Movendo para pasta separa no projeto
                $requestImage->move(public_path('imgs/user_images'), $imageName); 
                
                // inserindo o nome no banco de dados
                $userId = auth()->id();
                $user = User::find($userId);
                $user->user_image = $imageName;
                $user->save();
                return redirect()->back();

                break;

            case $request->has('deleteUserImage'):
                $id = auth()->id();
                $user = User::find($id);
                $user->user_image = 'redperson.png';
                $user->save();
                return redirect()->back();
                break;         
        }
    }

}
