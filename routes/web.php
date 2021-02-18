<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchlistController;

Route::get('/', function () {
    return view('index');
})->name('index');

//REMOVE LATER//
Route::get('/user', function () {
    return view('user');
})->name('user');
//END REMOVE LATER//

Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::patch('/genres', [GenreController::class, 'update'])->name('genres.update');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');

Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::patch('/movies', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

require __DIR__.'/auth.php';

Route::get('/reviews/create', [ReviewController::class, 'create']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::patch('/reviews', [ReviewController::class, 'update']);
Route::delete('/reviews/{review}', [ReviewController::class, 'delete']);


Route::get('/watchlists', [WatchlistController::class, 'index']);
Route::get('/watchlists/{watchlist}', [WatchlistController::class, 'show']);
Route::get('/watchlists/{watchlist}/edit', [WatchlistController::class, 'edit']);
Route::post('/watchlists', [WatchlistController::class, 'store']);
Route::patch('/watchlists', [WatchlistController::class, 'update']);
Route::delete('/watchlists/{watchlist}', [WatchlistController::class, 'delete']);
