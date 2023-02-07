<?php

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
Route::post('/books', [\App\Http\Controllers\BookController::class, 'books'])->name('books');
//Contatos
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/myAccount', [App\Http\Controllers\MyAccountController::class, 'myAccount'])->name('myAccount');

//Fallback
Route::fallback(function(){return view('layouts.components.error');});