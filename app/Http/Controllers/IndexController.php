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
        $movies = Movie::all();

        //profile/movie
        if(auth()->user()){

            $watchlistStatus = array();
            foreach(auth()->user()->profile->movies as $key => $movie) {
                $watchlistStatus[$key] = $movie->id . ',';
            };
            $watchlistStatus = ',' . implode($watchlistStatus);

            $profileWatchlist = auth()->user()->profile->movies;

            return view('index', compact('genres', 'watchlistStatus', 'profileWatchlist', 'movie'));
        }

        return view('index', compact('genres', 'movie', 'movies',));
    }
}
