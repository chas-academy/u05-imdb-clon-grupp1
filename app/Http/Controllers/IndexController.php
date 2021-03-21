<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;

class IndexController extends Controller
{
    public function index(Movie $movie)
    {
        $genres = Genre::all();

        if(!auth()->user()) return view('index', compact('genres', 'movie',));

        $watchlistStatus = $movie->watchlistStatus();
        return view('index', compact('genres', 'watchlistStatus', 'movie'));
    }
}
