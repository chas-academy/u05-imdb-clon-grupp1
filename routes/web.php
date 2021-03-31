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

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/user/{id}/edit', [AdminController::class, 'edituser']);
Route::get('/admin/user/create', [AdminController::class, 'createuser']);
Route::post('/admin/user', [AdminController::class, 'store']);
Route::patch('/admin/user-update/{id}', [AdminController::class, 'updateuser']);
Route::delete('/admin/user/{id}', [AdminController::class, 'destroyuser']);

Route::get('/admin/review/{id}/edit', [AdminController::class, 'editreview']);
Route::patch('/admin/review-update/{id}', [AdminController::class, 'updatereview']);
Route::delete('/admin/review/{id}', [AdminController::class, 'destroyreview']);
Route::delete('/admin/movie/{id}', [AdminController::class, 'destroymovie']);

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/reviews/{movie}/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/{movie}', [ReviewController::class, 'store'])->name('reviews.store');
Route::patch('/movies/{movie}', [ReviewController::class, 'update'])->name('reviews.update');

Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('reviews/{review}', [ReviewController::class, 'showReview'])->name('reviews.show');
Route::get('reviews/{review}/edit', [ReviewController::class, 'editReview'])->name('reviews.edit');
Route::put('reviews/{id}', [ReviewController::class, 'updateReview'])->name('reviews.updateReview');
Route::post('rating/{id}/update', [ReviewController::class, 'updateRating']);

Route::resource('movies', MovieController::class);

Route::get('watchlist/{user}', [WatchlistController::class, 'index'])->name('watchlist.index');
Route::post('watchlist/{movie}', [MovieController::class, 'addToWatchlist']);

Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::get('/search/', [SearchMoviesController::class, 'search'])->name('search');

Route::apiResource('review-api', ApiReviewController::class);
Route::apiResource('movie-api', ApiMovieController::class);
Route::apiResource('genre-api', ApiGenreController::class);
