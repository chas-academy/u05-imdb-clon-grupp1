<?php

namespace App\Http\Controllers;

use App\Models\Movie;
class WatchlistController extends Controller {
    public function __construct() {}

    public function index(Movie $movie) {
        $watchlistStatus = $movie->watchlistStatus();

        return view('watchlist.index', compact('watchlistStatus'));
    }
}
