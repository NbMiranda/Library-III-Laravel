<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyAccountController extends Controller
{
    // login validation 
    public function __construct(){
        $this->middleware('validation');
    }
    public function myAccount(){
        $id = auth()->id();
        $userImage = User::find($id)->user_image;
        
        // $rent = Rental::whereNull('return_in')->get()


        $books = Rental::select('books.book_name', 'books.id')
            ->join('books', 'rentals.book_id', '=', 'books.id')
            ->where('rentals.user_id', $id)
            ->whereNull('rentals.return_in')
            ->get();
        // dd($userImage);
        return view('myAccount', compact('userImage', 'books'));
    }
    public function changeImage($img) {
        $id = auth()->id();
        $user = User::find($id);
        $user->user_image = $img;
        $user->save();
        return redirect()->back();
                
    }

    public function updatePhoto(Request $request){
        
        // switch/case to add/delete a user image
        switch (true) {
            // ADD IMAGE
            case $request->has('addUserImage'):
                $requestImage = $request->file('user_image');

                // Criando nome unico para a imagem
                $extension = $requestImage->extension();
                $imageName = $requestImage->getClientOriginalName() . strtotime("now") . "." . $extension;
        
                // Movendo para pasta separa no projeto
                $requestImage->move(public_path('imgs/user_images'), $imageName); 
                
                // inserindo o nome no banco de dados
                $this->changeImage($imageName);
                
                return redirect()->back();

                break;
            
            // DELETE IMAGE
            case $request->has('deleteUserImage'):
                
                $this->changeImage('redperson.png');
                return redirect()->back();
                break;         
        }
    }

}
