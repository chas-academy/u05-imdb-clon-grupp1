<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreCollection;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\Movie;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache as FacadesCache;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $reviews = new ReviewCollection(Review::all());
        // $genres = new GenreCollection(Genre::all());
        // $movies = new MovieCollection(Movie::all());
        // $users = User::all();
        // return view('welcome', compact('reviews', 'genres', 'movies', 'users'));

        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }


    public function create($id)
    {
        $movie = Movie::findOrFail($id);

        return view('reviews.create', compact('movie'));
    }


    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required',
        ]);

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

    public function updateRating(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->rating = $request->rating;
        $review->save();
    }

    public function createReview(Request $request, $id)
    {
        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review = Review::findOrFail($id);
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
    }

    public function updateReview(Request $request, $id)
    {
        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review = Review::findOrFail($id);
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
    }


    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $movie = Movie::findOrFail($id);
        $user = User::findOrFail($id);
    


        return view('reviews.edit', compact('review', 'movie', 'user'));
    }

    // Not redirecting or updating database
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review = Review::findOrFail($id);

        $review->review = $request->review;
        $review->rating = $request->rating;


        $review->save();
        return redirect("/movies/{$review->movies_id}");
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back();
    }
}
