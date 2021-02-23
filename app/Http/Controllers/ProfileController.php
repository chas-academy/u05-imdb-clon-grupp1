<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    // public function index()
    // {

    // }

    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    // Not working!!
    public function update(User $user, Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $profile = Profile::findOrFail($id);
        $profile->title = $request->title;
        // $profile->image = $request->image; //Lägg till senare

        return redirect("/profile/{$user->profile->id}");
    }

}
