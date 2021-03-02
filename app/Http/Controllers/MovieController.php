<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show']);
    }

    public function index(User $user)
    {
        $movies = Movie::latest()->paginate(20);

        return view('movies.index', compact('movies', 'user'));
    }

    public function show(Movie $movie, User $user)
    {
        $watchlistStatus = (auth()->user() ? auth()->user()->profile->movies->contains($movie->id) : false);

        $reviews = $movie->reviews()->paginate(3);
        return view('movies.show', compact('movie', 'reviews', 'user', 'watchlistStatus'));
    }

    public function addToWatchlist(Movie $movie)
    {
        return auth()->user()->profile->movies()->toggle($movie);
    }

    public function create()
    {
        $genres = Genre::all();

        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'actors' => 'required',
            'language' => 'required',
            'release_date' => 'required',
            'img_path' => 'required', // add correct path later
            'trailer_path' => 'required',
            'genres' => 'required',
        ]);

        $movie = new Movie();

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->actors = $request->actors;
        $movie->language = $request->language;
        $movie->release_date = $request->release_date;
        $movie->img_path = $request->img_path;
        $movie->trailer_path = $request->trailer_path;

        $movie->save();

        $movie->genres()->attach($request->genres);

        return redirect("/movies");
    }

    public function edit($id)
    {
        $genres = Genre::all();
        $movie = Movie::findOrFail($id);

        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'actors' => 'required',
            'language' => 'required',
            'release_date' => 'required',
            'img_path' => 'required', // add correct path later
            'trailer_path' => 'required',
            'genres' => 'required',
        ]);

        $movie = Movie::findOrFail($id);

        $movie->genres()->detach();

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->actors = $request->actors;
        $movie->language = $request->language;
        $movie->release_date = $request->release_date;
        $movie->img_path = $request->img_path;
        $movie->trailer_path = $request->trailer_path;

        $movie->save();

        $movie->genres()->attach($request->genres);

        return redirect("/movies");
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->reviews()->delete();
        $movie->genres()->detach();
        $movie->delete();

        return redirect('/movies');
    }
}
