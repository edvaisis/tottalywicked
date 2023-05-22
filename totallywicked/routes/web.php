<?php

use App\Http\Controllers\RickMortyApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [RickMortyApiController::class, 'getIndex'])->name('home');

Route::get('/characters/search', [RickMortyApiController::class, 'search'])->name('characters.search');

Route::get('/characters', [RickMortyApiController::class, 'characters'])->name('characters');

Route::fallback(function () {
    return view('404');
})->name('404');



