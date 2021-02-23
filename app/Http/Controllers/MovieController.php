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

        return view('movlies.index', compact('movies'));
    }

    public function show(Movie $movie, Review $review, User $user)
    {
        return view('movies.show', compact('movie', 'review', 'user'));
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
        $movie->delete();

        return redirect('/movies');
    }
}
