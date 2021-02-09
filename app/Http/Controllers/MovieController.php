<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index');
    }

    public function show(Genre $genre, Movie $movie, Review $review, User $user)
    {
        return view('movies.show', compact('genre', 'movie', 'review', 'user'));
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
