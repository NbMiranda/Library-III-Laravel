<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//Login
// Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
// Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('loginPost');
// //Register
// Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register');
// Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register');
//Contact
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Auth::routes();

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
