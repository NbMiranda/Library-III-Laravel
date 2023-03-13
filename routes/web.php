<?php

use App\Mail\MensagemTestMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckLoginMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
//OOPS
Route::get('/oops', function(){return view('layouts.components.oops');})->name('oops');

//Livros CRUD
Route::get('/books', [\App\Http\Controllers\BookController::class, 'books'])->name('books');
Route::post('/bookCreate', [\App\Http\Controllers\BookController::class, 'create'])->name('bookCreate');
Route::post('/bookUpdate', [\App\Http\Controllers\BookController::class, 'update'])->name('bookUpdate');
Route::post('/bookDelete', [\App\Http\Controllers\BookController::class, 'delete'])->name('bookDelete');

// Book Cover
Route::post('/addBookCover', [\App\Http\Controllers\BookController::class, 'addBookCover'])->name('addBookCover');
Route::post('/delBookCover', [\App\Http\Controllers\BookController::class, 'delBookCover'])->name('delBookCover');

// Show Book
Route::get('/showBook/{id}', [\App\Http\Controllers\showBookController::class, 'showBook'])->name('showBook');
Route::post('/showBook/{id}', [\App\Http\Controllers\showBookController::class, 'showBook'])->name('showBook');

//Writers CRUD
Route::get('/writers', [\App\Http\Controllers\WriterController::class, 'writers'])->name('writers');
Route::post('/writerCreate', [\App\Http\Controllers\WriterController::class, 'create'])->name('writerCreate');
Route::post('/writerUpdate', [\App\Http\Controllers\WriterController::class, 'update'])->name('writerUpdate');
Route::post('/writerDelete', [\App\Http\Controllers\WriterController::class, 'delete'])->name('writerDelete');

//Contatos
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

Auth::routes();

// Reset password 
Route::get('/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('reset');

// logout
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Minha conta
Route::get('/myAccount', [App\Http\Controllers\MyAccountController::class, 'myAccount'])->name('myAccount');
Route::post('/myAccount', [App\Http\Controllers\MyAccountController::class, 'updatePhoto'])->name('myAccount');

// rentals
Route::get('/rentals', [App\Http\Controllers\RentalController::class, 'rentals'])->name('rentals');
Route::post('/rentBook', [App\Http\Controllers\RentalController::class, 'rentBook'])->name('rentBook');
Route::post('/returnBook', [App\Http\Controllers\RentalController::class, 'returnBook'])->name('returnBook');

//Fallback
Route::fallback(function(){return view('layouts.components.error');});