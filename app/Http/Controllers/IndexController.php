<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(Movie $movie, User $user)
    {
        $genres = Genre::all();
        $movies = Movie::latest()->paginate(9);

        if(auth()->user()){
            $watchlistStatus = $movie->watchlistStatus();
            $profileWatchlist = auth()->user()->profile->movies->paginate(9);

            return view('index', compact('genres', 'watchlistStatus', 'profileWatchlist', 'movie'));
        }

        return view('index', compact('genres', 'movie', 'movies',));
    }
}
