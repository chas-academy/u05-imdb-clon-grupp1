<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
        public function __construct() 
    {
        // $this->middleware('auth');
    }
     public function index()
    {
        $watchlists = Watchlist::all();
        return view('watchlist.index');
    }
    public function show(Watchlist $watchlist, Review $review, Movie $movie, User $user)
    {
        return view('watchlist.show', compact('watchlist', 'review', 'movie', 'user'));
    }
    public function store()
    {
        return redirect('/watchlist');
    }
    public function edit()
    {
        return view('watchlist.edit', [
            'watchlist' => Watchlist::findOrFail($id)
        ]);
    }
    public function update(Watchlist $watchlist)
    {
        return redirect("/watchlists/{$watchlist->$id}");
    }
    public function destroy()                       
    {
        $watchlist = Watchlist::findOrFail($id);
        $watchlist->delete();
        return redirect('/watchlists');
    }
}
