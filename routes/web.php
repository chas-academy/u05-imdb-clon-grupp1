<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiGenreController;
use App\Http\Controllers\Api\ApiMovieController;
use App\Http\Controllers\Api\ApiReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\IndexController;

require __DIR__ . '/auth.php';

// Middleware Test Route
Route::get('/admin', function () {
    return view('admin.admin');
})->middleware('admin');
// End Test Route

Route::get('/', [IndexController::class, 'index'])->name('index');



Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/reviews/{movie}/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::post('/movies/{movie}', [ReviewController::class, 'store'])->name('reviews.store');
Route::patch('/movies/{movie}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/movies/{movie}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::resource('movies', MovieController::class);
Route::post('/movies/{movie}', [MovieController::class, 'addToWatchlist'])->name('movies.watchlist');

Route::post('watchlist/{movie}', [MovieController::class, 'addToWatchlist']);
Route::post('rating/{id}', [ApiReviewController::class, 'addRating']);

Route::apiResource('review-api', ApiReviewController::class);
Route::apiResource('movie-api', ApiMovieController::class);
Route::apiResource('genre-api', ApiGenreController::class);
/*
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
*/
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
/*
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
*/
