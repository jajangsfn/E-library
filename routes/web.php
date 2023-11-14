<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

//route index register
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index']);

//route store register
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

//route index login
Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

//route store login
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);

//route logout
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'destroy'])->middleware('auth');

//route dashboard
Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->middleware('auth');

//route buku
Route::resource('/books', \App\Http\Controllers\BookController::class)->middleware('auth');
// Route::get('/books',  [\App\Http\Controllers\BookController::class, 'index']);
//anggota
Route::resource('/anggotas', \App\Http\Controllers\AnggotaController::class)->middleware('auth');
//peminjaman
Route::resource('/peminjaman', \App\Http\Controllers\PeminjamanController::class)->middleware('auth');


