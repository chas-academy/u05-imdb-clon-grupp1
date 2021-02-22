<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// En watchlist har en User och många filmer

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/noimage.png';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'watchlist_pivot', 'profiles_id', 'movies_id');
    }
}
