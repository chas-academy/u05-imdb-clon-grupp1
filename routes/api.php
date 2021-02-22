<?php

use App\Http\Controllers\Api\ApiGenreController;
use App\Http\Controllers\Api\ApiMovieController;
use App\Http\Controllers\Api\ApiReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function () {
    Route::resource('genre-api', ApiGenreController::class)->shallow();
    Route::resource('movie-api', ApiMovieController::class)->shallow();
    Route::resource('review-api', ApiReviewController::class)->shallow();
});
