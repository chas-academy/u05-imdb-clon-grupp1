<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreCollection;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\ReviewCollection;
use App\Models\Review;
use App\Models\Movie;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache as FacadesCache;

class ReviewController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    } */

    public function index()
    {
        $reviews = new ReviewCollection(Review::all());
        $genres = new GenreCollection(Genre::all());
        $movies = new MovieCollection(Movie::all());
        $users = User::all();
        return view('welcome', compact('reviews', 'genres', 'movies', 'users'));
    }

    public function show(Movie $movie)
    {
        return view('show', compact('movie'));
    }


    public function create()
    {
        return view('reviews.create');
    }

    /*
    public function store()
    {
        return redirect('/reviews');
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', [
            'review' => Review::findOrFail($id)
        ], compact('review'));
    }

    public function update(Review $review)
    {
        return redirect("/reviews/{$review->$id}");
    }

    public function destroy()
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect('/reviews');
    } */
}
