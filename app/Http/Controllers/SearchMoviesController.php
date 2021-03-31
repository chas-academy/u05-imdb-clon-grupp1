<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
class SearchMoviesController extends Controller {
    public function search(Request $request, Movie $movie) {
        $query = $request->input('query');

        $movies = Movie::query()->where('title', 'like', "%$query%")->orWhere('actors', 'like', "%$query%")->get();

        $searchMoviesId = array();
        foreach($movies as $key => $movie) {
            $searchMoviesId[$key] = $movie->id . ',';
        };
        $searchMoviesId = ',' . implode($searchMoviesId);

        if(!auth()->user()) return view('movies.search', compact('movies', 'searchMoviesId'));

        $watchlistStatus = $movie->watchlistStatus();
        return view('movies.search', compact('movies', 'searchMoviesId', 'watchlistStatus'));
    }
}
