<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $movies = Movie::latest()->paginate(20);

        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('show', compact('genre', 'movie', 'review', 'user'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store()
    {
        return redirect('/movies');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.edit', compact('movie'));
    }

    public function update(Movie $movie)
    {
        return redirect("/movies/{$movie->id}");
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect('/movies');
    }
}
