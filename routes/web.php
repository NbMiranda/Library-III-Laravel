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
Route::post('/books', [\App\Http\Controllers\BookController::class, 'crud'])->name('books');

// Update Book
Route::get('/updateBook/{id}', [\App\Http\Controllers\updateBookController::class, 'updateBook'])->name('updateBook');
Route::post('/updateBook/{id}', [\App\Http\Controllers\updateBookController::class, 'updateBook'])->name('updateBook');

//Writers CRUD
Route::get('/writers', [\App\Http\Controllers\WriterController::class, 'writers'])->name('writers');
Route::post('/writers', [\App\Http\Controllers\WriterController::class, 'crud'])->name('writers');

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

//Fallback
Route::fallback(function(){return view('layouts.components.error');});