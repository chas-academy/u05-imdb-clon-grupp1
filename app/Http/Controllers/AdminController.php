<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Profile;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $reviews = Review::all();
        $movies = Movie::all();
        $users = User::all();
        return view('admin.panel', compact('reviews', 'users', 'movies'));
    }

    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function showUsers()
    {
        //
    }

    public function createuser()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect("/admin");
    }

    public function edit()
    {
        //
    }

    public function updateuser($id)
    {

        $user = User::findOrFail($id);

        $data = request()->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $user->update(array_merge(
            $data
        ));

        return redirect("/admin");
    }

    public function destroyuser($id)
    {
        $user = User::findOrFail($id);
        $user->reviews()->delete();
        $user->profile()->delete();
        $user->delete();

        return redirect("/admin");
    }

    public function editreview($id)
    {
        $review = Review::findOrFail($id);
        $movie = Movie::findOrFail($review->movies_id);
        $user = User::findOrFail($review->user_id);
        //$totalReviews = $movie->reviews()->paginate()->total();

        return view('admin.reviews.edit', compact('review', 'movie', 'user'));
    }

    public function updatereview($id)
    {
        $review = Review::findOrFail($id);

        $data = request()->validate([
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review->update(array_merge(
            $data
        ));
        return redirect("/admin");
    }

    public function destroyreview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect("/admin");
    }

    public function destroymovie($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->reviews()->delete();
        $movie->genres()->detach();
        $movie->delete();

        return redirect('/admin');
    }
}
