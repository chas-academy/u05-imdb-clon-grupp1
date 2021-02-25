<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // public function index()
    // {

    // }

    public function show(Profile $profile, User $user)
    {
        return view('profile.show', compact('user', 'profile'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => ''
        ]);

            
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->orientate()->fit(1000, 1000); //Intervention Image Package
            $imageArray = ['image' => $imagePath];
        }

        $profile = Profile::findOrFail($id);
        $profile->title = $request->title;
        // $profile->image = $request->image; //Lägg till senare

        $profile->save();



        return redirect("/profile/{$profile->user_id}");
    }
}
