<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
class ReviewController extends Controller {

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function create($id) {
        $checkAuth = auth()->user()->reviews->contains('movies_id', $id);

        if(auth()->user()->reviews->contains('movies_id', $id)){
            return redirect("/movies/{$id}");
        }

        $movie = Movie::findOrFail($id);
        $review = new Review;

        $totalReviews = $movie->reviews()->paginate()->total();

        return view('reviews.create', compact('movie', 'review', 'checkAuth', 'totalReviews'));
    }


    public function store(Request $request, $id) {
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
        $review->save();

        $movie->updateTopRating($movie);

        return redirect("/movies/{$movie->id}");
    }

    public function editReview(Review $review, User $user, Profile $profile) {
        $this->authorize('update', $review);
        $movie = Movie::findOrFail($review->movies_id);
        $totalReviews = $movie->reviews()->paginate()->total();

        return view('reviews.edit', compact('review', 'movie', 'user', 'profile', 'totalReviews'));
    }

    public function updateReview(Request $request, Review $review, $id) {
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

    public function destroy($id) {
        $review = Review::findOrFail($id);
        $review->delete();
        return back();
    }
}
