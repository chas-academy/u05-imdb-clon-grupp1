<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
class WatchlistController extends Controller
{
    public function __construct() {}

    public function index(Movie $movie)
    {
        $watchlistStatus = array();
        foreach(auth()->user()->profile->movies as $key => $movie) {
            $watchlistStatus[$key] = $movie->id . ',';
        };
        $watchlistStatus = ',' . implode($watchlistStatus);

        $profileWatchlist = auth()->user()->profile->movies->paginate(9);

        return view('watchlist.index', compact( 'watchlistStatus', 'profileWatchlist', 'movie'));
    }

}
