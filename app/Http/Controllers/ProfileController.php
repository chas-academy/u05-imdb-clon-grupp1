<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Profile $profile, User $user, Movie $movie)
    {
        $this->authorize('view', $user->profile);

        $reviews = auth()->user()->reviews->map(function ($review) {
            $review['title'] =  Movie::findOrFail($review->movies_id)->title;
            return $review;
        })->paginate(4);;

        $watchlistStatus = $movie->watchlistStatus();

        return view('profile.show', compact('user', 'profile', 'watchlistStatus', 'reviews'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update($id)
    {
        $profile = Profile::findOrFail($id);
        $user = User::findOrFail($id);

        $data = request()->validate([
            'title' => 'required|max:255',
            'image' => ''
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(1000, 1000); //Intervention Image Package
            $imageArray = ['image' => $imagePath];
            $image->save();
        }

        // $profile->image = $request->image; //Lägg till senare

        $profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$profile->user_id}");
    }
}
