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
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $movies = Movie::latest()->paginate(20);

        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie, User $user)
    {
        $reviews = $movie->reviews()->paginate(3);
        return view('movies.show', compact('movie', 'reviews', 'user'));
    }

    public function addToWatchlist($id) 
    {
        $movie_id = Movie::findOrFail($id);

        $profile = Profile::findOrFail($id);
        $profile->movies()->attach($movie_id);

        return back();
    }

    public function create()
    {
        return view('movies.create');
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

        return redirect('/movies');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.edit', compact('movie'));
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
        ]);

        $movie = Movie::findOrFail($id);
        
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->actors = $request->actors;
        $movie->language = $request->language;
        $movie->release_date = $request->release_date;
        $movie->img_path = $request->img_path;
        $movie->trailer_path = $request->trailer_path;

        $movie->save();

        return redirect("/movies");
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->reviews()->delete();
        $movie->delete();

        return redirect('/movies');
    }
}
