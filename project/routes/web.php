<?php

use App\Models\Answers;
use App\Models\Questions;
use App\Models\Candidates;
use App\Models\HistoryTest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\HistoryTestController;

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






Route::resource('/questionsAndAnswers', HistoryTestController::class)->middleware(['auth']);

Route::resource('questions', QuestionsController::class)->middleware(['auth']);

Route::resource('candidate' , CandidateController::class)->middleware(['auth']);






require __DIR__.'/auth.php';
