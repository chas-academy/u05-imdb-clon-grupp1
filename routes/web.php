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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');



Route::get('/reviews/{movie}/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/{movie}', [ReviewController::class, 'store'])->name('reviews.store');
// Route::post('movies/{movie}', [ReviewController::class, 'store'])->name('reviews.store');
// Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::patch('/movies/{movie}', [ReviewController::class, 'update'])->name('reviews.update');

Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('reviews/{review}', [ReviewController::class, 'showReview'])->name('reviews.show');
Route::get('reviews/{review}/edit', [ReviewController::class, 'editReview'])->name('reviews.edit');
Route::put('reviews/{id}', [ReviewController::class, 'updateReview'])->name('reviews.updateReview');
Route::post('rating/{id}/update', [ReviewController::class, 'updateRating']);
// Route::post('rating/{id}/create', [ReviewController::class, 'createReview']);

Route::resource('movies', MovieController::class);

Route::get('watchlist/{user}', [WatchlistController::class, 'index'])->name('watchlist.index');
Route::post('watchlist/{movie}', [MovieController::class, 'addToWatchlist']);

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

//Movies search
Route::get('/search/',[SearchMoviesController::class,'search'])->name('search');
