<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('genres.index');
    }

    public function show(Genre $genre, Movie $movie)
    {
        return view('genres.show', compact('genre', 'movie'));
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
