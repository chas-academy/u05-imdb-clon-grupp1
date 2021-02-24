<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;

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
            'title' => 'required|max:255'
        ]);

        $profile = Profile::findOrFail($id);
        $profile->title = $request->title;
        // $profile->image = $request->image; //Lägg till senare

        $profile->save();
        
        $user = User::findOrFail($id);
        

        return redirect("/profile/{$user->profile->id}");
    }

}
