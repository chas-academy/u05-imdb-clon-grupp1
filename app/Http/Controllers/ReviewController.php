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
        // $reviews = new ReviewCollection(Review::all());
        // $genres = new GenreCollection(Genre::all());
        // $movies = new MovieCollection(Movie::all());
        // $users = User::all();
        // return view('welcome', compact('reviews', 'genres', 'movies', 'users'));

    }

    public function show(Movie $movie)
    {
        return view('show', compact('movie'));
    }


    public function create($id)
    {
        $movie = Movie::findOrFail($id);

        return view('reviews.create', compact('movie'));
    }


    public function store(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $review = new Review;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->user_id = auth()->user()->id;
        $review->movies_id = $movie->id;

        // Log::info("Review ID {$request->id} created successfully.");

        $review->save();

        return redirect("/movies/{$movie->id}");
    }


    // Kolla på edit för reviews, samt auth för reviews så den som skapat den kan ta bort den.
    public function edit(Review $review, $id)
    {
        return view('reviews.edit', [
            'review' => Review::findOrFail($id)
        ], compact('review'));
    }

    public function update(Review $review, $id)
    {
        return redirect("/reviews/{$review->$id}");
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back();
    }
}
