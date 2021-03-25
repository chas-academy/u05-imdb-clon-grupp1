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
use App\Models\Profile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache as FacadesCache;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
/*
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

*/
    public function create($id)
    {
        $checkAuth = auth()->user()->reviews->contains('movies_id', $id);

        if(auth()->user()->reviews->contains('movies_id', $id)){
            return redirect("/movies/{$id}");
        }


        $movie = Movie::findOrFail($id);
        $review = new Review;

        return view('reviews.create', compact('movie', 'review', 'checkAuth'));
    }


    public function store(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        if (auth()->user()->reviews->contains('movies_id', $id)) {
            return false;
        }

        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review = new Review;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->user_id = auth()->user()->id;
        $review->movies_id = $movie->id;

        // Log::info("Review ID {$request->id} created successfully.");

        $review->save();

        $movie->updateTopRating($movie);

        return redirect("/movies/{$movie->id}");
    }
/*

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.edit', compact('review'));
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
    } */

    /* REVIEWS AND RATING */

    public function editReview(Review $review, User $user, Movie $movie, Profile $profile)
    {
        $this->authorize('update', $review);


        return view('reviews.edit', compact('review', 'movie','user', 'profile'));
    }

    public function updateRating(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->rating = $request->rating;
        $review->save();

    }

    /*public function createReview(Request $request, Review $review, User $user, Movie $movie, Profile $profile)
    {
        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review = Review::findOrFail($id);
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
        return view('reviews.create', compact('review', 'movie','user', 'profile'));
    } */

    public function updateReview(Request $request, Review $review, $id)
    {
        $this->validate($request, [
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review = Review::findOrFail($id);
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        $movie = Movie::findOrFail($review->movies_id);
        $movie->updateTopRating($movie);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back();
    }
}
