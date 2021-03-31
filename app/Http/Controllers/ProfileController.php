<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function show(Profile $profile, User $user, Movie $movie) {
        $this->authorize('view', $user->profile);

        $reviews = auth()->user()->reviews->map(function ($review) {
            $review['title'] =  Movie::findOrFail($review->movies_id)->title;
            return $review;
        })->paginate(4);

        $watchlistStatus = $movie->watchlistStatus();

        return view('profile.show', compact('user', 'profile', 'watchlistStatus', 'reviews'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update($id) {
        $profile = Profile::findOrFail($id);
        $user = User::findOrFail($id);

        $data = request()->validate([
            'title' => 'required|max:255',
            'image' => ''
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 's3');
            Storage::disk('s3')->setVisibility($imagePath, 'public');
            $image = ['image' => Storage::disk('s3')->url($imagePath)];
        }

        $profile->update(array_merge(
            $data,
            $image ?? [],
        ));

        return redirect("/profile/{$profile->user_id}");
    }
}
