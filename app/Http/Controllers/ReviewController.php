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


    public function store(Request $request)
    {

        $review = new Review;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->user_id = $request->user_id;
        $review->movies_id = $request->movies_id;

        // Log::info("Review ID {$request->id} created successfully.");

        $review->save();

        return redirect('/reviews');
    }

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
        return redirect('/reviews');
    }
}
