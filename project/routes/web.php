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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('back.admin.home');
})->middleware(['auth'])->name('dashboard');
Route::get('/platforme', function () {
    return view('front.home');
})->middleware(['auth'])->name('platforme');
Route::get('/platforme', )->middleware(['auth'])->name('platforme');

require __DIR__.'/auth.php';
