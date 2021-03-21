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
        $watchlistStatus = $movie->watchlistStatus();

        return view('watchlist.index', compact('watchlistStatus'));
    }

}
