<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $reviews = Review::latest()->paginate(15);
        return view('reviews.index', compact('reviews'));
    }
    public function show(Review $review, Movie $movie, User $user, Genre $genre)
    {
        return view('reviews.show', compact('review', 'movie', 'user', 'genre'));
    }
    public function create()
    {
        return view('reviews.create');
    }
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
    }
}
