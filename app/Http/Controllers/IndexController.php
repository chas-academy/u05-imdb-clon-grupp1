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

        if(auth()->user()){
            $watchlistStatus = array();
            foreach(auth()->user()->profile->movies as $key => $movie) {
                    $watchlistStatus[$key] = $movie->id . ',';
            };

            $watchlistStatus = ',' . implode($watchlistStatus);
            return view('index', compact('genres', 'movies', 'watchlistStatus'));
        }

        return view('index', compact('genres', 'movies'));
    }
}
