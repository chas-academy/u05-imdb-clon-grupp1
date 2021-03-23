<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $genres = Genre::latest()->paginate(20);

        return view('genres.index', compact('genres'));
    }

    public function show(Genre $genre, Movie $movie)
    {
        if(!auth()->user()) return view('genres.show', compact('genre', 'movie'));

        $watchlistStatus = $movie->watchlistStatus();
        return view('genres.show', compact('genre', 'movie','watchlistStatus'));
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store()
    {
        return redirect('/genres');
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);

        return view('genre.edit', compact('genre'));
    }

    public function update(Genre $genre)
    {
        return redirect("/movies/{$genre->id}");
    }

    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect('/genres');
    }
}
